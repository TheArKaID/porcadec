<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => 'Administrator',
            'email' => 'admin@porcalabs.com',
            'role' => \App\Models\User::$ADMIN
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Doctor',
            'email' => 'doctor@porcalabs.com',
            'role' => \App\Models\User::$DOCTOR
        ]);
        $this->call([
            DetectionModelSeeder::class,
            ScanModelSeeder::class
        ]);
        // $this->call([
        //     PatientSeeder::class,
        // ]);
    }
}
