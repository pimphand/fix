<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    DB::table('users')->insert([
      'role' => 0,
      'username' => 'admin',
      'email' => 'admin@gmail.com',
      'password' => bcrypt('admin'),
      'name' => 'admin0',
      'phone' => '0',
      'id_ktp' => '0',
      'img_ktp' => null,
      'img' => null,
      'status' => 1,
      'delete' => 0,
    ]);

    DB::table('users')->insert([
      'role' => 1,
      'username' => 'doctor',
      'email' => 'doctor@gmail.com',
      'password' => bcrypt('doctor'),
      'name' => 'doctor1',
      'phone' => '1',
      'id_ktp' => '1',
      'img_ktp' => null,
      'img' => null,
      'status' => 0,
      'delete' => 0,
    ]);



    DB::table('users')->insert([
      'role' => 3,
      'username' => 'member',
      'email' => 'member@gmail.com',
      'password' => bcrypt('member'),
      'name' => 'member3',
      'phone' => '3',
      'id_ktp' => '3',
      'img_ktp' => null,
      'img' => null,
      'status' => 0,
      'delete' => 0,
    ]);
  }
}
