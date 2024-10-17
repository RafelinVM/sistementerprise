<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\Employees;
use App\Models\User;
use App\Models\Department; // Gunakan satu import ini
use App\Models\Departments;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    // Tampilkan daftar karyawan
    public function index()
    {
        $employees = Employees::all();
        return view('admin.employees.index', compact('employees'));
    }

    // Tampilkan form untuk membuat data karyawan baru
    public function create()
    {
        $users = User::all(); // Ambil semua pengguna
        $departments = Departments::all(); // Ambil semua departemen
        return view('admin.employees.create', compact('users', 'departments'));
    }

    // Simpan data karyawan baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'depart_id' => 'required|exists:departments,id',
            'address' => 'required|string|max:255',
            'place_of_birth' => 'required|string|max:255',
            'dob' => 'required|date',
            'religion' => 'required|string|max:50',
            'sex' => 'required|in:Male,Female',
            'phone' => 'required|string|max:15',
            'salary' => 'required|numeric',
            'photo' => 'nullable|image|max:2048'
        ]);

        $employeeData = $request->except('photo');

        // Simpan file foto jika ada
        if ($request->hasFile('photo')) {
            $employeeData['photo'] = $request->file('photo')->store('photos', 'public');
        }

        Employees::create($employeeData);

        return redirect()->route('employees.index')->with('success', 'Karyawan berhasil dibuat.');
    }

    // Tampilkan data detail dari satu karyawan
    public function show($id)
    {
        $employee = Employees::findOrFail($id);
        return view('employees.show', compact('employee'));
    }

    // Tampilkan form untuk mengedit data karyawan
    public function edit($id)
    {
        $employee = Employees::findOrFail($id);
        $users = User::all();
        $departments = Departments::all();
        return view('admin.employees.edit', compact('employee', 'users', 'departments'));
    }

    // Update data karyawan yang telah diedit
    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'depart_id' => 'required|exists:departments,id',
            'address' => 'required|string|max:255',
            'place_of_birth' => 'required|string|max:255',
            'dob' => 'required|date',
            'religion' => 'required|string|max:50',
            'sex' => 'required|in:Male,Female',
            'phone' => 'required|string|max:15',
            'salary' => 'required|numeric',
            'photo' => 'nullable|image|max:2048'
        ]);

        $employee = Employees::findOrFail($id);
        $employeeData = $request->except('photo');

        // Update file foto jika ada
        if ($request->hasFile('photo')) {
            // Hapus foto lama
            if ($employee->photo) {
                Storage::delete('public/' . $employee->photo);
            }

            $employeeData['photo'] = $request->file('photo')->store('photos', 'public');
        }

        $employee->update($employeeData);

        return redirect()->route('employees.index')->with('success', 'Karyawan berhasil diperbarui.');
    }

    // Hapus data karyawan
    public function destroy($id)
    {
        $employee = Employees::findOrFail($id);

        // Hapus file foto jika ada
        if ($employee->photo) {
            Storage::delete('public/' . $employee->photo);
        }

        $employee->delete();

        return redirect()->route('employees.index')->with('success', 'Karyawan berhasil dihapus.');
    }
}
