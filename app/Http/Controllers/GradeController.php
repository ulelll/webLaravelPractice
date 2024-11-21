<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class GradeController extends Controller
{
    public function index()
    {
        $grades = Grade::all();

        return view('grades', [
            'title' => 'Grade',
            'grades' => $grades->load('students', 'Department')
        ]);
    }
}
