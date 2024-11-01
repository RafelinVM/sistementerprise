@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Payroll</h1>

    <form action="{{ route('payrolls.update', $payroll->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="user_id">Pilih User</label>
            <select name="user_id" id="user_id" class="form-control">
                <option value="">-- Pilih User --</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ $user->id == $payroll->user_id ? 'selected' : '' }}>{{ $user->name }}</option>
                @endforeach
            </select>
            @error('user_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="salary">Gaji</label>
            <input type="number" name="salary" id="salary" class="form-control" value="{{ $payroll->salary }}" placeholder="Masukkan Gaji">
            @error('salary')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Perbarui</button>
    </form>
</div>
@endsection
