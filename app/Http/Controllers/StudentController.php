<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

use App\Models\Grade;

class StudentController extends Controller
{
    public function grades()
    {
        $studentId = auth()->id();

        // Lấy tất cả điểm kèm thông tin khóa học
        $grades = Grade::where('user_id', $studentId)->with('course')->get();

        return view('student.grades.index', compact('grades'));
    }
}
