<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('orders', 'OrderController');
Route::get('orders/status/{status}', ['as' => 'orders.bystatus', 'uses' => 'OrderController@byStatus']);
Route::get('orders/customer/{id}', ['as' => 'orders.bycustomer', 'uses' => 'OrderController@byCustomer']);

Route::resource('contacts', 'ContactController');

Route::resource('customers/guests/contacts', 'Customer\Guest\ContactController');
Route::resource('customers/guests/dietaryrestrictions', 'Customer\Guest\DietaryRestrictionController');
Route::resource('customers/guests', 'Customer\GuestController');
Route::resource('customers/contacts', 'Customer\ContactController');
Route::resource('customers', 'CustomerController');

Route::resource('inventories/items', 'Inventory\ItemController');
Route::resource('inventories', 'InventoryController');

Route::resource('menus/items', 'Menu\ItemController');
Route::resource('menus', 'MenuController');

Route::resource('orders/items', 'Order\ItemController');
Route::resource('orders/notes', 'Order\NoteController');
Route::resource('orders', 'OrderController');

Route::resource('recipes/ingredients', 'Recipe\IngredientController');
Route::resource('recipes/instructions', 'Recipe\InstructionController');
Route::resource('recipes/nutrition', 'Recipe\NutritionController');
Route::resource('recipes', 'RecipeController');

Route::resource('sources/contacts', 'Source\ContactController');
Route::resource('sources', 'SourceController');