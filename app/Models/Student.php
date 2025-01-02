<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['name', 'dob', 'class_id',  'email', 'gpa', 'gender'];

    // Một học sinh thuộc về một lớp
    public function class()
    {
        return $this->belongsTo(ClassModel::class, 'class_id'); // Đảm bảo đúng tên cột
    }

}
