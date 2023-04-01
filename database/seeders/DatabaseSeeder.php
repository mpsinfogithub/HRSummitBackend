<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Crypt;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Sourav Saha',
            'email' => 'admin@hrsummit.com',
            'password' => Crypt::encryptString("admin@123"),
            'phone' => '8788722881',
            'role' => 'admin'
        ]);
    }
}
