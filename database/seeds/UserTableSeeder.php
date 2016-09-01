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

        factory(User::class)->create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => bcrypt('123456'),
            'remember_token' => str_random(10),
        ]);

        factory(User::class)->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456'),
            'remember_token' => str_random(10),
            'role' => 'admin'
        ]);

        factory(User::class, 10)->create()->each(function($user) {
            $user->client()->save(factory(Client::class)->make());
        });

        factory(User::class, 5)->create([
            'role' => 'deliveryman'
        ]);
    }
}
