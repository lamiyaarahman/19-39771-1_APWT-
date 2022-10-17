<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory()->create([

          'name'=> 'Student 1',
          'email'=> 'lamiyarahman.cse@gmail.com',
          'phone'=> '01791685179',
          'password'=> '123456',
          'dob'=> '2022-10-01',
        


        ]);
    }
}
