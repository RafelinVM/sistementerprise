@extends('admin.app')

@section('content')
<div class="container">
    <h3>Tambah Promosi</h3>

    <form action="{{ route('promotions.store') }}" method="POST">
        @csrf
        <div class="form-group mb-3"> <!-- Menambahkan mb-3 untuk margin bawah -->
            <label for="name">Nama Promosi</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="form-group mb-3"> <!-- Menambahkan mb-3 untuk margin bawah -->
            <label for="description">Deskripsi</label>
            <textarea name="description" id="description" class="form-control" rows="4"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection