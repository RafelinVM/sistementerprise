<?php

namespace App\Http\Controllers;

use App\Models\Departments;
use Illuminate\Http\Request;


class DepartmentsController extends Controller
{
    // Tampilkan semua department
    public function index() {
        $departments = Departments::all();
        return view('admin.departments.index', compact('departments'));
    }

    // Tampilkan form untuk membuat department baru
    public function create() {
        return view('admin.departments.create');
    }

    // Simpan department baru
    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Departments::create($validated);

        return redirect()->route('departments.index')->with('success', 'Department created successfully.');
    }

    // Tampilkan form untuk mengedit department
    public function edit(Departments $department) {
        return view('admin.departments.edit', compact('department'));
    }

    // Update department yang ada
    public function update(Request $request, Departments $department) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $department->update($validated);

        return redirect()->route('departments.index')->with('success', 'Department updated successfully.');
    }

    // Hapus department
    public function destroy(Departments $department) {
        $department->delete();
        return redirect()->route('departments.index')->with('success', 'Department deleted successfully.');
    }
}
