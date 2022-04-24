<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategorySeeder::class);

        User::create([
            'name' => 'Khushidbek',
            'email' => 'bawo@mailinator.com',
            'password' => bcrypt('Pa$$w0rd!')
        ]);
    }
}
