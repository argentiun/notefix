<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SchemaGeneralDatabase extends Migration
{

     public function up()
     {
         Schema::create('products', function (Blueprint $table) {
             $table->increments('id');
             $table->float('price');
             $table->text('description');
             $table->string('name', 255);
             $table->string('slug', 255)->unique();
             $table->boolean('visible')->default(1);
             $table->timestamps();

             $table->integer('category_id')->unsigned();
         });

         Schema::create('categories', function (Blueprint $table) {
             $table->increments('id');
             $table->string('value', 255);
             $table->timestamps();
         });

         Schema::create('images', function (Blueprint $table) {
             $table->increments('id');
             $table->string('src');
             $table->timestamps();

             $table->integer('product_id')->unsigned();
         });


     }

     public function down()
     {
         Schema::dropIfExists('products');
         Schema::dropIfExists('categories');
         Schema::dropIfExists('images');
     }
}
