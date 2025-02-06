<?php

namespace App\Http\Controllers\admin;

use App\Models\Department;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.department.index', [
            'title' => "Departments",
            'departments' => Department::all(),

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.department.create', [
            "title" => "Create New Department Data",
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data yang dikirimkan
        $validated = $request->validate([
            'name'      => 'required|string|max:255',
            'desc'      => 'required',
        ]);

        // Simpan data student ke dalam tabel students
        $department = Department::create([
            'name' => $validated['name'],
            'desc' => $validated['desc'],
        ]);

        // Redirect atau response sukses
        return redirect('/admin/departments/')->with('success', 'Department created successfully.');
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
        $departments = Department::findOrFail($id);

        // Tampilkan halaman edit dengan data siswa dan grades
        return view('admin.department.edit', [
            'title' => 'Edit Department Data',
            'department' => $departments,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi data yang dikirimkan
        $validated = $request->validate([
            'name'      => 'required|string|max:255',
            'desc'  => 'required',
        ]);

        $department = Department::findOrFail($id);

        // Update data siswa
        $department->update([
            'name'     => $validated['name'],
            'desc' => $validated['desc'],
        ]);

        // Redirect kembali dengan pesan sukses
        return redirect('/admin/departments/')->with('success', 'Department updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

}
