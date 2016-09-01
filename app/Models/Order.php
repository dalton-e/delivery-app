<?php

namespace DeliveryApp\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Order extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'client_id', 'deliveryman_id', 'total', 'date', 'status',
    ];

    protected $nullable = [
        'deliveryman_id'
    ];

    protected static function boot() {
        parent::boot();

        static::saving(function($model) {
            self::setNullables($model);
        });
    }

    public function items() {
        return $this->hasMany(OrderItem::class);
    }

    public function client() {
        return $this->belongsTo(Client::class);
    }

    public function deliveryman() {
        return $this->belongsTo(User::class, 'deliveryman_id', 'id');
    }

    private static function setNullables($model) {
        foreach($model->nullable as $field) {
            if(empty($model->{$field})) {
                $model->{$field} = null;
            }
        }
    }
}
