<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   *
   * * Role
   * * * 0. Admin
   * * * 1. Doctor
   * * * 2. Store
   * * * 3. User
   * * Status
   * * * 0. New Member
   * * * 1. Active Member
   * * * 2. Suspend
   * * Delete
   * * * 0. UnDelete
   * * * 1. Delete
   * * * 2. Permanent Delete
   */
  public function up()
  {
    Schema::create('users', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->integer('role')->default(3);
      $table->string('username')->unique();
      $table->string('email')->unique();
      $table->timestamp('email_verified_at')->nullable();
      $table->string('password');
      $table->string('name');
      $table->integer('phone')->nullable()->unique();
      $table->integer('id_ktp')->nullable()->unique();
      $table->text('img_ktp')->nullable();
      $table->text('img')->nullable();
      $table->integer('status')->default(0);
      $table->integer('delete')->default(0);
      $table->rememberToken();
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
    Schema::dropIfExists('users');
  }
}
