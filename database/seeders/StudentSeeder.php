<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Student;
use App\Models\ClassModel;

use Faker\Factory as Faker;

class StudentSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create(); // Tạo một instance của Faker

        // Lấy lớp học đầu tiên từ cơ sở dữ liệu
        $class = ClassModel::first(); // Hoặc bạn có thể tạo lớp mới nếu chưa có

        // Tạo 10 sinh viên ngẫu nhiên
        for ($i = 0; $i < 10; $i++) {
            Student::create([
                'name' => $faker->name,
                'dob' => $faker->date($format = 'Y-m-d', $max = 'now'), // Ngày sinh ngẫu nhiên
                'class_id' => $class->id = '3',  // Liên kết với lớp
                'email' => $faker->email,
                'gpa' => $faker->randomFloat(2, 0, 4), // GPA ngẫu nhiên từ 0 đến 4
                'gender' => $faker->randomElement(['male', 'female']), // Giới tính ngẫu nhiên

            ]);
        }
    }
}
