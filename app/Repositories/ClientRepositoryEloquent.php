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

    public function create(array $attributes)
    {
        $attributes['user']['password'] = bcrypt('123456');
        $user = $this->model->user()->getRelated()->newInstance($attributes['user']);
        $user->save();

        $attributes['user_id'] = $user->id;
        $client = $this->model->newInstance($attributes);
        $client->save();
    }

    public function update(array $attributes, $id)
    {
        $client = $this->model->findOrFail($id);
        $client->fill($attributes);
        $client->save();

        $user = $client->user()->first();
        $user->fill($attributes['user']);
        $client->user()->update($attributes['user']);
    }

}
