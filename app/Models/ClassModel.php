<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassModel extends Model
{
    protected $fillable = ['name'];

    // Một lớp có nhiều học sinh
    public function students()
    {
        return $this->hasMany(Student::class, 'class_id'); // Đảm bảo đúng tên cột
    }
}
