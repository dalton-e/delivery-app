<?php

namespace DeliveryApp\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use DeliveryApp\Repositories\OrderItemRepository;
use DeliveryApp\Models\OrderItem;
use DeliveryApp\Validators\OrderItemValidator;

/**
 * Class OrderItemRepositoryEloquent
 * @package namespace DeliveryApp\Repositories;
 */
class OrderItemRepositoryEloquent extends BaseRepository implements OrderItemRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return OrderItem::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
