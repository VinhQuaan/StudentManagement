<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'courses';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'code', 'description', 'duration', 'credit'];

    public function teacher() {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function students()
    {
        return $this->belongsToMany(User::class, 'course_user')->whereHas('roles', function ($q) {
            $q->where('name', 'student');
        });
    }

    use HasFactory;
}
