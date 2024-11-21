<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Student;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        $department = Department::all();

        return view('department', [
            'title' => 'Department',
            'department' => $department->load('students')
        ]);
    }
}
