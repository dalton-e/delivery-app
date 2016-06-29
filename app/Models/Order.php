<?php

namespace DeliveryApp\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $fillable = [
        'client_id', 'deliveryman_id', 'total', 'date', 'status',
    ];

    public function items() {
        return $this->hasMany(OrderItem::class);
    }

    public function client() {
        return $this->belongsTo(User::class, 'client_id');
    }

    public function deliveryman() {
        return $this->belongsTo(User::class, 'deliveryman_id');
    }

}
