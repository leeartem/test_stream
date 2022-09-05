<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'nickname' => 'pewdiepie',
            'email' => 'pew@die.pie',
            'email_verified_at' => '2022-08-31 17:31:27',
            'password' => \Hash::make('pewdiepie'),
            'secret_key' => \Str::uuid(),
        ]);
    }
}
