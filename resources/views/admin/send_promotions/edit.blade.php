
@extends('admin.app')

@section('content')
<div class="container">
    <h3>Edit Kirim Promosi</h3>

    <form action="{{ route('send-promotions.update', $sendPromotion->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="customer_id">Customer</label>
            <select name="customer_id" id="customer_id" class="form-control" required>
                @foreach($customers as $customer)
                    <option value="{{ $customer->id }}" {{ $customer->id == $sendPromotion->customer_id ? 'selected' : '' }}>
                        {{ $customer->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="promotion_id">Promosi</label>
            <select name="promotion_id" id="promotion_id" class="form-control" required>
                @foreach($promotions as $promotion)
                    <option value="{{ $promotion->id }}" {{ $promotion->id == $sendPromotion->promotion_id ? 'selected' : '' }}>
                        {{ $promotion->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('send-promotions.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
