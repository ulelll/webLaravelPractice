<?php

namespace App\Http\Controllers\admin;

use App\Models\Student;
use App\Models\Grade;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $students = Student::with('grade')->latest()->get();

        //     return view('admin.student.index', compact('students'), [ //adminstudent.php
        //         'title' => "Students",
        //         'students' => $students
        //     ]);
        $query = $request->input('q');


        $students = Student::with(['grade', 'department'])
            ->when($query, function ($queryBuilder) use ($query) {
                $queryBuilder->where('name', 'like', '%' . $query . '%')
                    ->orWhere('email', 'like', '%' . $query . '%')
                    ->orWhere('address', 'like', '%' . $query . '%')
                    ->orWhereHas('grade', function ($q) use ($query) {
                        $q->where('name', 'like', '%' . $query . '%');
                    });
            })
            ->paginate(10); // Fetch 10 students per page

        return view('admin.student.index', compact('students'), [
            'title' => 'Student',
            'students' => $students,
            'searchQuery' => $query
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.student.create', [ //student\create
            "title"     => "Create New Data",
            'grades'    => Grade::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate the data tht u sent
        $validated = $request->validate([
                'name'      => 'required|string|max:255',
                'grade_id'  => 'required|exists:grades,id',
                'email'     => 'required',
                'address'   => 'required|string|max:255',
        ]);

        //savin the student's data to student table
        $student = Student::create([
            'name'      => $validated['name'],
            'grade_id'  => $validated['grade_id'],
            'email'     => $validated['email'],
            'address'   => $validated['address'],
        ]);

        //redirect success response
        return redirect('/admin/students')->with('success', 'Student created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //taking data based on id
        $student = Student::findOrFail($id);

        //taking grade data to dropdown form
        $grades = Grade::all();

        //showing the edit page with student data and grade
        return view('admin.student.edit', [ //student\edit
            'title'     => 'Edit Student Data',
            'student'   => $student,
            'grades'    => $grades
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //validate data tht been sent
        $validated = $request->validate([
            'name'      => 'required|string|max:255',
            'grade_id'  => 'required|exists:grades,id',
            'email'     => 'required|email|max:255',
            'address'   => 'required|string|max:255',
        ]);

        //finding student's data based on id
        $student = Student::findOrFail($id);

        //updating the student's data
        $student->update([
            'name'     => $validated['name'],
            'grade_id' => $validated['grade_id'],
            'email'    => $validated['email'],
            'address'  => $validated['address'],
        ]);

        //redirect with success messege
        return redirect('/admin/students')->with('success', 'Student updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //finding student's data by id
        $student = Student::findOrFail($id);
        //removing student's data
        $student->delete();
        //redirect messege
        return redirect('/admin/students')->with('success', 'Student deleted successfully.');
    }
}
