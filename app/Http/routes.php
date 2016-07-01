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

Route::resource('order', 'OrderController');
Route::get('order/status/{status}', ['as' => 'order.bystatus', 'uses' => 'OrderController@byStatus']);
Route::get('order/customer/{id}', ['as' => 'order.bycustomer', 'uses' => 'OrderController@byCustomer']);

Route::resource('menu', 'MenuController');

Route::resource('recipe', 'RecipeController');

Route::resource('recipe/ingredient', 'Recipe\IngredientController');
Route::resource('recipe/instruction', 'Recipe\InstructionController');
Route::resource('recipe/nutrition', 'Recipe\NutritionController');