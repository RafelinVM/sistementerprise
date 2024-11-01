@extends('admin.app')

@section('content')
<div class="container">
    <h3>Edit Promosi</h3>

    <form action="{{ route('promotions.update', $promotion->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nama Promosi</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $promotion->name) }}" required>
        </div>
        <div class="form-group">
            <label for="description">Deskripsi</label>
            <textarea name="description" id="description" class="form-control" rows="4">{{ old('description', $promotion->description) }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('promotions.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection