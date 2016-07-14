<?php

namespace DeliveryApp\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use DeliveryApp\Repositories\ClientRepository;
use DeliveryApp\Models\Client;
use DeliveryApp\Validators\ClientValidator;

/**
 * Class ClientRepositoryEloquent
 * @package namespace DeliveryApp\Repositories;
 */
class ClientRepositoryEloquent extends BaseRepository implements ClientRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Client::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
