<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id')->unsigned()->nullable();
            $table->text('name');
            $table->enum('status', ['open', 'closed', 'cancelled', 'in_progress', 'complete', 'invoiced', 'paid', 'arrears']);
            $table->integer('created_by')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('created_by')->references('id')->on('users');
        });
        
        Schema::create('event_notes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('event_id')->unsigned();
            $table->text('note');
            
            $table->integer('created_by')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            
            $table->foreign('event_id')->references('id')->on('events');
            $table->foreign('created_by')->references('id')->on('users');
        });
        
        Schema::create('event_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('event_id')->unsigned();
            $table->integer('guest_id')->unsigned();
            $table->integer('menu_item_id')->unsigned();
            $table->text('note')->nullable();
            
            $table->integer('created_by')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            
            $table->foreign('event_id')->references('id')->on('events');
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
