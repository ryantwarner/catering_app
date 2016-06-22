<?php

use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Order::class, 10)->create();
        factory(App\Order\Item::class, 10)->create();
        factory(App\Order\Note::class, 10)->create();
    }
}
