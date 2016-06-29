<?php

use Illuminate\Database\Seeder;
use DeliveryApp\Models\User;
use DeliveryApp\Models\Client;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Client::truncate();
        User::truncate();

        factory(User::class, 10)->create()->each(function($user) {
            $user->client()->save(factory(Client::class)->make());
        });
    }
}
