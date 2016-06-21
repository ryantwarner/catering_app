<?php

use Illuminate\Database\Seeder;

class RecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Recipe::class, 10)->create();
        factory(App\Recipe\Ingredient::class, 30)->create();
        factory(App\Recipe\Instruction::class, 15)->create();
        factory(App\Recipe\Nutrition::class, 10)->create();
    }
}
