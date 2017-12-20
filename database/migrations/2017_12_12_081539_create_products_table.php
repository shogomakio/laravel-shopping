<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigInteger('product_id')->primary()->unique()->nullable($value = false);
            $table->string('name', 64)->nullable();
            $table->string('detail', 128)->nullable();
//            $table->timestamp('created_at')->nullable($value = false);
//            $table->timestamp('updated_at')->nullable($value = false);
            $table->timestamps();
            $table->datetime('deleted_at')->nullable();
            $table->integer('price')->nullable();
            $table->integer('status')->nullable();
            $table->string('image_path', 255)->nullable($value = false);
            $table->integer('genre_id')->nullable($value = false);
            $table->integer('brand_id')->nullable($value = false);
        });
        
        Schema::create('purchases', function(Blueprint $table){
            $table->increments('item_id')->unique()->nullable($value = false);
            $table->integer('user_id')->nullable($value = false);
            $table->datetime('purchase_date')->nullable($value = false);
            $table->string('payment_type', 16)->nullable($value = false);
            $table->index(['item_id']);
        });
        
        Schema::create('genres', function(Blueprint $table){
            $table->bigInteger('genre_id')->primary()->unique()->nullable($value = false);
            $table->string('genre_name', 32)->unique()->nullable($value = false);
        });
        
        Schema::create('brands', function(Blueprint $table){
            $table->increments('brand_id')->unique()->nullable($value = false);
            $table->string('brand_name', 32)->nullable($value = false);
        });
        
        Schema::create('administrators', function(Blueprint $table){
            $table->bigInteger('admin_id')->primary()->unique()->nullable($value = false);
            $table->string('first_name', 12)->nullable($value = false);
            $table->string('last_name', 12)->nullable($value = false);
            $table->datetime('created_at')->nullable($value = false);
            $table->datetime('updated_at')->nullable($value = false);
            $table->string('email', 255)->unique()->nullable($value = false);
            $table->string('password', 255)->nullable($value = false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
