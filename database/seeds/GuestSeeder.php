<?php

use Illuminate\Database\Seeder;

class GuestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Customer\Guest::class, 10)->create();
        factory(App\Customer\Guest\Contact::class, 10)->create();
        factory(App\Customer\Guest\DietaryRestriction::class, 10)->create();
    }
}
