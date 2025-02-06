<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\Grade;
use App\Models\Department;
use Illuminate\Http\Request;

class StudentAdminController extends Controller
{
    public function index()
    {
        $students = Student::with(['grade', 'department'])->latest()->get();

            return view('student-admin', [
                'title' => 'Student Admin',
                'students' => Student::all()
            ]);
    }
}



