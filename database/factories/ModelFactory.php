<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\Models\Access\User\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Contact::class, function (Faker\Generator $faker) {
    return [
        'salutation' => $faker->title,
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'address1' => $faker->streetAddress,
        'city' => $faker->city,
        'country' => $faker->country,
        'postal_code' => $faker->postcode,
        'email_address' => $faker->email,
        'primary_telephone' => $faker->phoneNumber,
        'secondary_telephone' => $faker->phoneNumber,
        'created_by' => App\User::all()->random()->id
    ];
});

$factory->define(App\Customer::class, function(Faker\Generator $faker) {
    return [
        'name' => $faker->company,
        'description' => $faker->text,
        'created_by' => App\User::all()->random()->id
    ];
});

$factory->define(App\Customer\Contact::class, function(Faker\Generator $faker) {
    return [
        'contact_id' => App\Contact::all()->random()->id,
        'customer_id' => App\Customer::all()->random()->id,
        'created_by' => App\User::all()->random()->id
    ];
});

$factory->define(App\Source::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->company,
        'description' => $faker->text,
        'created_by' => App\User::all()->random()->id
    ];
});

$factory->define(App\Source\Contact::class, function(Faker\Generator $faker) {
    return [
        'contact_id' => App\Contact::all()->random()->id,
        'source_id' => App\Source::all()->random()->id,
        'created_by' => App\User::all()->random()->id
    ];
});

$factory->define(App\Inventory::class, function (Faker\Generator $faker) {
    return [
        'name' => ucwords(implode(" ", $faker->words)),
        'description' => $faker->text,
        'created_by' => App\User::all()->random()->id
    ];
});

$factory->define(App\Inventory\Item::class, function (Faker\Generator $faker) {
    $received = $faker->date('Y-m-d');
    return [
        'inventory_id' => App\Inventory::all()->random()->id,
        'source_id' => App\Source::all()->random()->id,
        'name' => ucwords(implode(" ", $faker->words)),
        'description' => $faker->text,
        'quantity' => ($faker->numberBetween(100, 2000) / 100),
        'unit_type_id' => App\UnitType::all()->random()->id,
        'item_type_id' => App\ItemType::all()->random()->id,
        'received' => $received,
        'best_before' => date("Y-m-d", strtotime($received . " +".$faker->numberBetween(1, 4)." weeks")),
        'created_by' => App\User::all()->random()->id
    ];
});

$factory->define(App\Menu\Item::class, function (Faker\Generator $faker) use ($factory) {
    return [
        'recipe_id' => (rand(0, 1) ? NULL : App\Recipe::all()->random()->id),
        'menu_id' => App\Menu::all()->random()->id,
        'name' => ucwords(implode(" ", $faker->words)),
        'description' => $faker->text,
        'price' => ($faker->numberBetween(100, 2000) / 100),
        'created_by' => App\User::all()->random()->id
    ];
});

$factory->define(App\Menu::class, function (Faker\Generator $faker) {
    return [
        'name' => ucwords(implode(" ", $faker->words)),
        'created_by' => App\User::all()->random()->id
    ];
});

$factory->define(App\Recipe::class, function (Faker\Generator $faker) {
    return [
        'name' => ucwords(implode(" ", $faker->words)),
        'description' => $faker->text,
        'created_by' => App\User::all()->random()->id
    ];
});

$factory->define(App\Recipe\Ingredient::class, function (Faker\Generator $faker) {
    return [
        'recipe_id' => App\Recipe::all()->random()->id,
        'name' => ucwords(implode(" ", $faker->words)),
        'description' => $faker->text,
        'quantity' => ($faker->numberBetween(100, 2000) / 100),
        'unit_type_id' => App\UnitType::all()->random()->id,
        'item_type_id' => App\ItemType::all()->random()->id,
        'created_by' => App\User::all()->random()->id
    ];
});

$factory->define(App\Recipe\Instruction::class, function (Faker\Generator $faker) {
    return [
        'recipe_id' => App\Recipe::all()->random()->id,
        'instruction' => $faker->text,
        'order' => rand(0, 10),
        'created_by' => App\User::all()->random()->id
    ];
});

$factory->define(App\Recipe\Nutrition::class, function (Faker\Generator $faker) {
    return [
        'recipe_id' => App\Recipe::all()->random()->id,
        'serving_size' => (rand(0, 20000) / 100),
        'serving_size_unit_type_id' => App\UnitType::all()->random()->id,
        'calories_per_serving' => round((rand(100, 20000) / 100)),
        'total_fat' => (rand(0, 20000) / 100),
        'saturated_fat' => (rand(0, 20000) / 100),
        'trans_fat' => (rand(0, 20000) / 100),
        'cholesterol' => (rand(0, 20000) / 100),
        'sodium' => (rand(0, 20000) / 100),
        'total_carbohydrates' => (rand(0, 20000) / 100),
        'dietary_fiber' => (rand(0, 20000) / 100),
        'sugars' => (rand(0, 20000) / 100),
        'protein' => (rand(0, 20000) / 100),
        'vitamin_a' => (rand(0, 20000) / 100),
        'vitamin_c' => (rand(0, 20000) / 100),
        'vitamin_d' => (rand(0, 20000) / 100),
        'iron' => (rand(0, 20000) / 100),
        'calcium' => (rand(0, 20000) / 100),
        'potassium' => (rand(0, 20000) / 100),
        'created_by' => App\User::all()->random()->id
    ];
});

$factory->define(App\Order::class, function (Faker\Generator $faker) {
    return [
        'customer_id' => App\Customer::all()->random()->id,
        'status' => $faker->randomElement(['open','closed','cancelled','in_progress','complete','invoiced','paid','arrears']),
        'created_by' => App\User::all()->random()->id
    ];
});

$factory->define(App\Order\Note::class, function (Faker\Generator $faker) {
    return [
        'order_id' => App\Order::all()->random()->id,
        'note' => $faker->sentence(),
        'created_by' => App\User::all()->random()->id
    ];
});

$factory->define(App\Order\Item::class, function (Faker\Generator $faker) {
    return [
        'order_id' => App\Order::all()->random()->id,
        'guest_id' => App\Customer\Guest::all()->random()->id,
        'menu_item_id' => App\Menu\Item::all()->random()->id,
        'note' => $faker->sentence(),
        'created_by' => App\User::all()->random()->id
    ];
});

$factory->define(App\Customer\Guest::class, function (Faker\Generator $faker) {
    return [
        'customer_id' => App\Customer::all()->random()->id,
        'note' => $faker->sentence(),
        'created_by' => App\User::all()->random()->id
    ];
});

$factory->define(App\Customer\Guest\Contact::class, function(Faker\Generator $faker) {
    return [
        'contact_id' => App\Contact::all()->random()->id,
        'guest_id' => App\Customer\Guest::all()->random()->id,
        'created_by' => App\User::all()->random()->id
    ];
});

$factory->define(App\Customer\Guest\DietaryRestriction::class, function(Faker\Generator $faker) {
    return [
        'guest_id' => App\Customer\Guest::all()->random()->id,
        'item_type_id' => App\ItemType::all()->random()->id,
        'restriction_note' => $faker->sentence(),
        'created_by' => App\User::all()->random()->id
    ];
});