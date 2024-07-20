<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
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
        User::truncate();
        User::create([
            'name'=>'Admin Marimas',
            'level'=>'admin',
            'email'=>'admin@admin.com',
            'password' => Hash::make('admin123'),
            'remember_token'=> Str::random(60),
        ]);
    }
}
