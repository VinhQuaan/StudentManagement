<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course; // nhớ import nếu chưa

class Batch extends Model
{
    use HasFactory;

    protected $table = 'batches';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'code',
        'course_id',
        'start_date',
        'end_date',
        'status',
    ];

    // Khai báo mối quan hệ: mỗi batch thuộc về 1 course
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
