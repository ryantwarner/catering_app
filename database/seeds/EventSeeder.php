<?php

use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Event::class, 10)->create();
        factory(App\Event\Item::class, 10)->create();
        factory(App\Event\Note::class, 10)->create();
    }
}
