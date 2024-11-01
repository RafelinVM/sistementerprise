@extends('admin.app')

@section('content')
<div class="container">
    <h3>Daftar Pengiriman Promosi</h3>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <a href="{{ route('send-promotions.create') }}" class="btn btn-primary">Kirim Promosi Baru</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Customer</th>
                <th>Promosi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sendPromotions as $sendPromotion)
                <tr>
                    <td>{{ $sendPromotion->id }}</td>
                    <td>{{ $sendPromotion->customer->name }}</td>
                    <td>{{ $sendPromotion->promotion->name }}</td>
                    <td>
                        <a href="{{ route('send-promotions.edit', $sendPromotion->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('send-promotions.destroy', $sendPromotion->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection