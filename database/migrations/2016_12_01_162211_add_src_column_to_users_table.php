<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSrcColumnToUsersTable extends Migration
{
  public function up()
  {
      Schema::table('users', function (Blueprint $table) {
          $table->string('src')->default('/img/default-profile.png');
      });
  }

  public function down()
  {
      Schema::table('users', function (Blueprint $table) {
          $table->dropColumn('src');
      });
  }
}
