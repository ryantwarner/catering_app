<?php

use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Menu::class, 3)->create();
        factory(App\Menu\Item::class, 10)->create();
    }
}
