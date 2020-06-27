<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChatRoomsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('chat_rooms', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->integer('doctor');
      $table->integer('user');
      $table->text('massage')->nullable();
      $table->integer('to');
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
    Schema::dropIfExists('chat_rooms');
  }
}