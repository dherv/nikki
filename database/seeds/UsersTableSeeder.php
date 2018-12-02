<?php

use Illuminate\Database\Seeder;

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
      'id' => 1,
      'name' => str_random(10),
      'email' => str_random(10) . '@gmail.com',
      'password' => bcrypt('secret'),
      'language_id' => 2
    ]);
  }
}
