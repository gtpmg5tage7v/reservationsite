<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
            [
            'name' => 'テストマン',
            'email' => 'test@test.com',
            'password' => Hash::make('12345678'),
            'role_id' => 1,
            'description' => 'About',
            'gender' => 'male',
            ],
            [
                'name' => 'アドミンマン',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('12345678'),
                'role_id' => 2,
                'description' => 'About',
                'gender' => 'male',
            ],
            [
                'name' => '顧客マン',
                'email' => 'user@user.com',
                'password' => Hash::make('12345678'),
                'role_id' => 3,
                'description' => 'About',
                'gender' => 'male',
            ],

        ]);
    }
}
