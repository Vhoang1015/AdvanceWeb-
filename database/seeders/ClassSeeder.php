<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ClassModel;



class ClassSeeder extends Seeder
{
    public function run()
    {
        ClassModel::create([
            'name' => 'Lớp 10A1',
        ]);
        ClassModel::create([
            'name' => 'Lớp 10A2',
        ]);
        ClassModel::create([
            'name' => 'Lớp 11B1',
        ]);
        ClassModel::create([
            'name' => 'Lớp 12C1',
        ]);
    }
}
