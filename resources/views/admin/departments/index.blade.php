@extends('admin.app')

@section('content')
<div class="container">
    <h3>Departments</h3>

    <a href="{{ route('departments.create') }}" class="btn btn-primary mb-3">Tambah Department</a>

    <table class="table table-sm table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Description</th>
                <th>Actions</th> <!-- Kolom aksi untuk edit dan delete -->
            </tr>
        </thead>
        <tbody>
            @foreach($departments as $department)
                <tr>
                    <td>{{ $loop->iteration }}</td> <!-- Iterasi untuk penomoran -->
                    <td>{{ $department->name }}</td> <!-- Menampilkan nama department -->
                    <td>{{ $department->description }}</td> <!-- Menampilkan deskripsi department -->
                    <td>
                        <!-- Edit Button -->
                        <a href="{{ route('departments.edit', $department->id) }}" class="btn btn-warning">Edit</a>

                        <!-- Delete Button -->
                        <form action="{{ route('departments.destroy', $department->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this department?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
