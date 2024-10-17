@extends('admin.app')

@section('content')
<div class="container">
    <h3 class="mt-4">Edit Karyawan</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('employees.update', $employee->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT') <!-- Menggunakan metode PUT untuk update -->

        <div class="mb-3">
            <label for="user_id" class="form-label">User</label>
            <select class="form-select" id="user_id" name="user_id" required>
                <option value="">Pilih User</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ $employee->user_id == $user->id ? 'selected' : '' }}>
                        {{ $user->name }} <!-- Ganti 'name' dengan kolom nama yang sesuai -->
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="depart_id" class="form-label">Departemen</label>
            <select class="form-select" id="depart_id" name="depart_id" required>
                <option value="">Pilih Departemen</option>
                @foreach($departments as $department)
                    <option value="{{ $department->id }}" {{ $employee->depart_id == $department->id ? 'selected' : '' }}>
                        {{ $department->name }} <!-- Menampilkan nama departemen -->
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $employee->address) }}" required>
        </div>

        <div class="mb-3">
            <label for="place_of_birth" class="form-label">Tempat Lahir</label>
            <input type="text" class="form-control" id="place_of_birth" name="place_of_birth" value="{{ old('place_of_birth', $employee->place_of_birth) }}" required>
        </div>

        <div class="mb-3">
            <label for="dob" class="form-label">Tanggal Lahir</label>
            <input type="date" class="form-control" id="dob" name="dob" value="{{ old('dob', $employee->dob) }}" required>
        </div>

        <div class="mb-3">
            <label for="religion" class="form-label">Agama</label>
            <input type="text" class="form-control" id="religion" name="religion" value="{{ old('religion', $employee->religion) }}" required>
        </div>

        <div class="mb-3">
            <label for="sex" class="form-label">Jenis Kelamin</label>
            <select class="form-select" id="sex" name="sex" required>
                <option value="">Pilih Jenis Kelamin</option>
                <option value="Male" {{ old('sex', $employee->sex) == 'Male' ? 'selected' : '' }}>Laki-laki</option>
                <option value="Female" {{ old('sex', $employee->sex) == 'Female' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Telepon</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $employee->phone) }}" required>
        </div>

        <div class="mb-3">
            <label for="salary" class="form-label">Gaji</label>
            <input type="number" class="form-control" id="salary" name="salary" value="{{ old('salary', $employee->salary) }}" required>
        </div>

        <div class="mb-3">
            <label for="photo" class="form-label">Foto</label>
            <input type="file" class="form-control" id="photo" name="photo" accept="image/*">
            @if($employee->photo)
                <img src="{{ asset('storage/' . $employee->photo) }}" alt="Foto Karyawan" class="img-thumbnail mt-2" style="width: 150px;">
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Update Karyawan</button>
        <a href="{{ route('employees.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection