<?php

Route::group(['middleware' => 'web'], function() {
    /**
     * Switch between the included languages
     */
    Route::group(['namespace' => 'Language'], function () {
        require (__DIR__ . '/Routes/Language/Language.php');
    });

    /**
     * Frontend Routes
     * Namespaces indicate folder structure
     */
    Route::group(['namespace' => 'Frontend'], function () {
        require (__DIR__ . '/Routes/Frontend/Frontend.php');
        require (__DIR__ . '/Routes/Frontend/Access.php');
    });
});

/**
 * Backend Routes
 * Namespaces indicate folder structure
 * Admin middleware groups web, auth, and routeNeedsPermission
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::resource('orders', 'OrderController');
    /**
     * These routes need view-backend permission
     * (good if you want to allow more than one group in the backend,
     * then limit the backend features by different roles or permissions)
     *
     * Note: Administrator has all permissions so you do not have to specify the administrator role everywhere.
     */
    require (__DIR__ . '/Routes/Backend/Dashboard.php');
    require (__DIR__ . '/Routes/Backend/Access.php');
    require (__DIR__ . '/Routes/Backend/LogViewer.php');
    
    
});

//Route::get('/', 'Dashboard\DashboardController@getIndex');
//
//Route::group(['prefix' => 'auth', 'namespace' => 'Auth'], function() {
//    Route::post('/login', 'AuthController@postLogin');
//    Route::get('/logout', 'AuthController@getLogout');
//    Route::get('/register', 'AuthController@getRegister');
//    Route::post('/register', 'AuthController@postRegister');
//});
/*
Route::group(['middleware' => ['auth', 'web']], function() {

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

//    Route::get('orders/{id}/items', 'Order\ItemController@byOrder');
    Route::resource('orders/{id}/items', 'Order\ItemController');
//    Route::get('orders/{id}/notes', 'Order\NoteController@byOrder');
    Route::resource('orders/{id}/notes', 'Order\NoteController');
    Route::get('orders/status/{status}', ['as' => 'orders.bystatus', 'uses' => 'OrderController@byStatus']);
    Route::get('orders/customer/{id}', ['as' => 'orders.bycustomer', 'uses' => 'OrderController@byCustomer']);
    Route::get('orders/{id}/guests', 'OrderController@guests');
//    Route::resource('orders', 'OrderController');

    Route::resource('recipes/ingredients', 'Recipe\IngredientController');
    Route::resource('recipes/instructions', 'Recipe\InstructionController');
    Route::resource('recipes/nutrition', 'Recipe\NutritionController');
    Route::resource('recipes', 'RecipeController');

    Route::resource('sources/contacts', 'Source\ContactController');
    Route::resource('sources', 'SourceController');
    
});*/