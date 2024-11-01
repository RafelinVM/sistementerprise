@extends('admin.app')

@section('content')
<div class="container">
    <h3 class="mt-4">Daftar Karyawan</h3>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('employees.create') }}" class="btn btn-primary mb-3">Tambah Karyawan</a>

    <table class="table table-sm table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Departemen</th>
                <th>Alamat</th>
                <th>Telepon</th>
                <th>Gaji</th>
                <th>Aksi</th> <!-- Kolom aksi untuk edit dan delete -->
            </tr>
        </thead>
        <tbody>
            @forelse ($employees as $employee)
                <tr>
                    <td>{{ $employee->id }}</td>
                    <td>{{ $employee->user->name ?? 'N/A' }}</td> <!-- Asumsi bahwa ada relasi user -->
                    <td>{{ $employee->department->name ?? 'N/A' }}</td> <!-- Ganti dengan nama departemen jika ada relasi -->
                    <td>{{ $employee->address }}</td>
                    <td>{{ $employee->phone }}</td>
                    <td>Rp.{{ number_format($employee->salary, 0, ',', '.') }} </td> <!-- Format gaji -->
                    <td>{{ $employee->photo }}</td>
                        <a href="{{ route('employees.show', $employee->id) }}" class="btn btn-info">Detail</a>
                        <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">Tidak ada data karyawan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
