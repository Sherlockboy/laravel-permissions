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
            'name' => 'Khushidbek',
            'email' => 'bawo@mailinator.com',
            'password' => bcrypt('Pa$$w0rd!')
        ]);

        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'is_admin' => 1,
            'password' => bcrypt('Password')
        ]);
    }
}
