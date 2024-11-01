@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Payroll</h1>

    <form action="{{ route('payrolls.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="user_id">Pilih User</label>
            <select name="user_id" id="user_id" class="form-control">
                <option value="">-- Pilih User --</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
            @error('user_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

            </select>

        <div class="form-group">
            <label for="salary">Gaji</label>
            <input type="number" name="salary" id="salary" class="form-control" placeholder="Masukkan Gaji">
            @error('salary')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
