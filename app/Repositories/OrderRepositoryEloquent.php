<?php

namespace DeliveryApp\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use DeliveryApp\Repositories\OrderRepository;
use DeliveryApp\Models\Order;
use DeliveryApp\Validators\OrderValidator;

/**
 * Class OrderRepositoryEloquent
 * @package namespace DeliveryApp\Repositories;
 */
class OrderRepositoryEloquent extends BaseRepository implements OrderRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Order::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
