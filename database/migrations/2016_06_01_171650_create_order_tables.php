<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id')->unsigned()->nullable();
            $table->enum('status', ['open', 'closed', 'cancelled', 'in_progress', 'complete', 'invoiced', 'paid', 'arrears']);
            $table->integer('created_by')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('created_by')->references('id')->on('users');
        });
        
        Schema::create('order_notes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id')->unsigned();
            $table->text('note');
            
            $table->integer('created_by')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            
            $table->foreign('order_id')->references('id')->on('orders');
            $table->foreign('created_by')->references('id')->on('users');
        });
        
        Schema::create('order_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id')->unsigned();
            $table->integer('guest_id')->unsigned()->nullable();
            $table->integer('menu_item_id')->unsigned();
            $table->text('notes')->nullable();
            
            $table->integer('created_by')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            
            $table->foreign('order_id')->references('id')->on('orders');
            $table->foreign('guest_id')->references('id')->on('guests');
            $table->foreign('menu_item_id')->references('id')->on('menu_items');
            $table->foreign('created_by')->references('id')->on('users');
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
