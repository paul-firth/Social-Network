<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class All extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function($table) {
          $table->increments('id');
          $table->integer('user_id'); //Foreign key
          $table->integer('product_id'); // foreign key
          $table->integer('quantity');
          $table->timestamps();
       });
       
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
        
        Schema::create('password_resets', function (Blueprint $table) {
            $table->string('email')->index();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });
        
        Schema::create('products', function(Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->float('price');
            $table->integer('manufacturer_id');
            $table->timestamps();
        });
        
        Schema::create('manufacturers', function(Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
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
