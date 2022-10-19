<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->times(count:1000)->create();
        // $faker = Faker::create();
        // $user = new User();
        // $user ->full_name = $faker;
        // $user ->age = $faker;
        // $user ->gender = $faker;
        // $user ->email = $faker;
        // $user ->latitude = $faker;
        // $user ->longitude = $faker;
        // $user ->full_name = $faker;
    }
}
