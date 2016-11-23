<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAdminAndVisibleToUser extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::table('users', function (Blueprint $table) {
             $table->boolean('visible')->default(1);
             $table->boolean('admin')->default(0);
         });
     }

     /**
      * Reverse the migrations.
      *
      * @return void
      */
     public function down()
     {
         Schema::table('users', function (Blueprint $table) {
             $table->dropColumn('visible');
             $table->dropColumn('admin');
         });
     }
 }
