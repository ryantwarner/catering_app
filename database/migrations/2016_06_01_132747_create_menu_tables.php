<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->boolean('active')->default(true);
            $table->integer('created_by')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            
            $table->foreign('created_by')->references('id')->on('users');
        });
        
        Schema::create('unit_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->boolean('active')->default(true);
            $table->integer('created_by')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            
            $table->foreign('created_by')->references('id')->on('users');
        });
        
        Schema::create('item_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->boolean('active')->default(true);
            $table->integer('created_by')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            
            $table->foreign('created_by')->references('id')->on('users');
        });
        
        Schema::create('recipes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->integer('servings');
            $table->boolean('active')->default(true);
            $table->integer('created_by')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('created_by')->references('id')->on('users');
        });
        
        Schema::create('recipe_ingredients', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('recipe_id')->unsigned();
            $table->string('name');
            $table->text('description')->nullable();
            $table->decimal('quantity', 8, 2);
            $table->integer('unit_type_id')->unsigned();
            $table->integer('item_type_id')->unsigned();
            $table->boolean('active')->default(true);
            $table->integer('created_by')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('recipe_id')->references('id')->on('recipes');
            $table->foreign('item_type_id')->references('id')->on('item_types');
            $table->foreign('unit_type_id')->references('id')->on('unit_types');
        });
        
        Schema::create('recipe_instructions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('recipe_id')->unsigned();
            $table->text('instruction');
            $table->integer('order');
            $table->boolean('active')->default(true);
            $table->integer('created_by')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('recipe_id')->references('id')->on('recipes');
        });
        
        Schema::create('recipe_nutrition', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('recipe_id')->unsigned();
            $table->decimal('serving_size', 8, 2);
            $table->integer('serving_size_unit_type_id')->unsigned();
            $table->decimal('calories_per_serving', 8, 2);
            $table->decimal('total_fat', 8, 2)->nullable();
            $table->decimal('saturated_fat', 8, 2)->nullable();
            $table->decimal('trans_fat', 8, 2)->nullable();
            $table->decimal('cholesterol', 8, 2)->nullable();
            $table->decimal('sodium', 8, 2)->nullable();
            $table->decimal('total_carbohydrates', 8, 2)->nullable();
            $table->decimal('dietary_fiber', 8, 2)->nullable();
            $table->decimal('sugars', 8, 2)->nullable();
            $table->decimal('protein', 8, 2)->nullable();
            $table->decimal('vitamin_a', 8, 2)->nullable();
            $table->decimal('vitamin_c', 8, 2)->nullable();
            $table->decimal('vitamin_d', 8, 2)->nullable();
            $table->decimal('iron', 8, 2)->nullable();
            $table->decimal('calcium', 8, 2)->nullable();
            $table->decimal('potassium', 8, 2)->nullable();
            $table->boolean('active')->default(true);
            $table->integer('created_by')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('recipe_id')->references('id')->on('recipes');
            $table->foreign('serving_size_unit_type_id')->references('id')->on('unit_types');
        });
        
        Schema::create('menu_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('menu_id')->unsigned();
            $table->integer('recipe_id')->unsigned()->nullable();
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->decimal('price', 8, 2);
            $table->boolean('active')->default(true);
            $table->integer('created_by')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('menu_id')->references('id')->on('menus');
            $table->foreign('recipe_id')->references('id')->on('recipes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('menus');
    }
}
