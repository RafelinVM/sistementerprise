
@extends('admin.app')

@section('content')
<div class="container">
    <h3>Kirim Promosi</h3>

    <form action="{{ route('send-promotions.store') }}" method="POST">
        @csrf
        <div class="form-group mb-3"> <!-- Menambahkan mb-3 untuk margin bawah -->
            <label for="customer_id">Customer</label>
            <select name="customer_id" id="customer_id" class="form-control" required>
                @foreach($customers as $customer)
                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mb-3"> <!-- Menambahkan mb-3 untuk margin bawah -->
            <label for="promotion_id">Promosi</label>
            <select name="promotion_id" id="promotion_id" class="form-control" required>
                @foreach($promotions as $promotion)
                    <option value="{{ $promotion->id }}">{{ $promotion->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Kirim</button>
    </form>
</div>
@endsection
