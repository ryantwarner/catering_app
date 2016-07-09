<?php

use Illuminate\Database\Seeder;

class SourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Source::class, 10)->create();
        factory(App\Source\Contact::class, 10)->create();
    }
}
