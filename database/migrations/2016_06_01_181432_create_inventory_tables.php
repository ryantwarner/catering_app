<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoryTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sources', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->integer('created_by')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('created_by')->references('id')->on('users');
        });
        
        Schema::create('inventories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->integer('created_by')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('created_by')->references('id')->on('users');
        });
        
        Schema::create('inventory_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('inventory_id')->unsigned()->nullable();
            $table->integer('source_id')->unsigned()->nullable();
            $table->string('name');
            $table->text('description')->nullable();
            $table->decimal('quantity', 8, 2);
            $table->integer('unit_type_id')->unsigned();
            $table->integer('item_type_id')->unsigned();
            $table->date('received');
            $table->date('best_before')->nullable();
            $table->boolean('active')->default(true);
            $table->integer('created_by')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('inventory_id')->references('id')->on('inventories');
            $table->foreign('source_id')->references('id')->on('sources');
            $table->foreign('item_type_id')->references('id')->on('item_types');
            $table->foreign('unit_type_id')->references('id')->on('unit_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
