<?php

namespace Database\Seeders;

use App\Models\DetectionModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DetectionModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DetectionModel::create([
            'name' => 'VGG',
            'code' => 'vgg'
        ]);
        DetectionModel::create([
            'name' => 'ResNet',
            'code' => 'resnet'
        ]);
    }
}
