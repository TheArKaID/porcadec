<?php

namespace Database\Seeders;

use App\Models\ScanModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ScanModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ScanModel::create([
            'name' => 'CT-Scan',
            'code' => 'ctscan'
        ]);
        ScanModel::create([
            'name' => 'X-Ray',
            'code' => 'xray'
        ]);
    }
}
