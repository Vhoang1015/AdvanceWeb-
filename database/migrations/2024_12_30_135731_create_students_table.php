<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('dob');
            $table->string('email');
            $table->decimal('gpa', 3, 2);
            $table->unsignedBigInteger('class_id'); // Khóa ngoại
            $table->enum('gender', ['male', 'female'])->nullable(); // Thêm cột gender
            $table->timestamps();

            // Tạo khóa ngoại liên kết với bảng class_models
            $table->foreign('class_id')->references('id')->on('class_models')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropForeign(['class_id']); // Xóa khóa ngoại
        });

        Schema::dropIfExists('students');
    }

};
