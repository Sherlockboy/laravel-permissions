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
        User::create([
            'name' => 'User',
            'email' => 'bawo@mailinator.com',
            'role_id' => 1,
            'password' => bcrypt('Pa$$w0rd!')
        ]);

        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'role_id' => 2,
            'password' => bcrypt('Password')
        ]);

        User::create([
            'name' => 'Publisher',
            'email' => 'publisher@admin.com',
            'role_id' => 3,
            'password' => bcrypt('Password')
        ]);
    }
}
