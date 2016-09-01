<?php

use Illuminate\Database\Seeder;
use DeliveryApp\Models\Order;
use DeliveryApp\Models\OrderItem;

class OrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OrderItem::truncate();
        Order::truncate();

        factory(Order::class, 5)->create()->each(function($order) {
            $itemsQuantity = rand(1, 5);
            for($i = 0; $i < $itemsQuantity; $i++) {
                $order->items()->save(factory(OrderItem::class)->make());
            }
        });
    }
}
