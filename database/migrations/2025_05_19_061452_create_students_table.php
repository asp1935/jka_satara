<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id(); // auto-increment primary key
            $table->string('student_id')->unique(); // custom generated student ID

            $table->string('name');
            $table->text('address');
            $table->string('mobile');
            $table->date('dob');
            $table->string('occupation');
            $table->string('education');
            $table->integer('age');
            $table->string('bloodgroup');
            $table->float('height');
            $table->float('weight');
            $table->string('photo');

            $table->unsignedBigInteger('branch_id');
            $table->unsignedBigInteger('sub_branch_id');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
