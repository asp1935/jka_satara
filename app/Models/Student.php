<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'student_id',
        'name',
        'address',
        'mobile',
        'dob',
        'occupation',
        'education',
        'age',
        'bloodgroup',
        'height',
        'weight',
        'photo',
        'branch_id',
        'sub_branch_id',
    ];

    // Automatically generate student_id like JKA00001, JKA00002, etc.
      protected static function booted()
    {
        static::creating(function ($student) {
            $latest = static::orderBy('id', 'desc')->first();
            $number = $latest ? ((int) substr($latest->student_id, 3)) + 1 : 1;
            $student->student_id = 'JKA' . str_pad($number, 5, '0', STR_PAD_LEFT);
        });
    }
}
