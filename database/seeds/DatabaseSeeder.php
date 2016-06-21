<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(CustomerSeeder::class);
        $this->call(SourceSeeder::class);
        $this->call(InventorySeeder::class);
        $this->call(ContactSeeder::class);
        
        DB::table('item_types')->insert([
            ['name' => 'vegetable', 'created_by' => App\User::all()->random()->id], 
            ['name' => 'herb_spice', 'created_by' => App\User::all()->random()->id], 
            ['name' => 'starch', 'created_by' => App\User::all()->random()->id], 
            ['name' => 'meat', 'created_by' => App\User::all()->random()->id], 
            ['name' => 'eggs', 'created_by' => App\User::all()->random()->id], 
            ['name' => 'dairy', 'created_by' => App\User::all()->random()->id], 
            ['name' => 'fish', 'created_by' => App\User::all()->random()->id], 
            ['name' => 'shellfish', 'created_by' => App\User::all()->random()->id], 
            ['name' => 'nut', 'created_by' => App\User::all()->random()->id], 
            ['name' => 'gluten', 'created_by' => App\User::all()->random()->id], 
            ['name' => 'soy', 'created_by' => App\User::all()->random()->id], 
            ['name' => 'alcohol', 'created_by' => App\User::all()->random()->id], 
            ['name' => 'gelatin', 'created_by' => App\User::all()->random()->id]
        ]);
        DB::table('unit_types')->insert([
            ['name' => 'g', 'created_by' => App\User::all()->random()->id], 
            ['name' => 'mg', 'created_by' => App\User::all()->random()->id], 
            ['name' => 'oz', 'created_by' => App\User::all()->random()->id], 
            ['name' => 'lb', 'created_by' => App\User::all()->random()->id], 
            ['name' => 'l', 'created_by' => App\User::all()->random()->id], 
            ['name' => 'ml', 'created_by' => App\User::all()->random()->id], 
            ['name' => 'floz', 'created_by' => App\User::all()->random()->id], 
            ['name' => 'cup', 'created_by' => App\User::all()->random()->id], 
            ['name' => 'tsp', 'created_by' => App\User::all()->random()->id], 
            ['name' => 'tbsp', 'created_by' => App\User::all()->random()->id], 
            ['name' => 'units', 'created_by' => App\User::all()->random()->id]
        ]);
        
        $this->call(RecipeSeeder::class);
        $this->call(MenuSeeder::class);
    }
}
