<?php

namespace DeliveryApp\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use DeliveryApp\Repositories\UserRepository;
use DeliveryApp\Models\User;
use DeliveryApp\Validators\UserValidator;

/**
 * Class UserRepositoryEloquent
 * @package namespace DeliveryApp\Repositories;
 */
class UserRepositoryEloquent extends BaseRepository implements UserRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return User::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function listDeliverymen()
    {
        return $this->model->where(['role' => 'deliveryman'])->lists('name', 'id');
    }
}
