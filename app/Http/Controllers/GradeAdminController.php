<?php

namespace App\Http\Controllers;
use App\Models\Grade;
use App\Models\Student;
use Illuminate\Http\Request;

class GradeAdminController extends Controller
{
    public function index()
    {
        $grade = Grade::all();
        return view('grade-admin', [
            'title' => 'Grade Admin',
            'grades' => $grade->load('students', 'department')
        ]);
    }
}
