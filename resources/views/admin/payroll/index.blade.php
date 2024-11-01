@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Payroll</h1>
    
    <a href="{{ route('payrolls.create') }}" class="btn btn-primary mb-3">Tambah Payroll</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>User</th>
                <th>Salary</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($payrolls as $payroll)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $payroll->user->name }}</td>
                    <td>{{ number_format($payroll->salary, 2) }}</td>
                    <td>
                        <a href="{{ route('payrolls.edit', $payroll->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('payrolls.destroy', $payroll->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus payroll ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
