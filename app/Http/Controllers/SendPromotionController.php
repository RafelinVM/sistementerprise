<?php

namespace App\Http\Controllers;

use App\Models\SendPromotion;
use App\Models\Customer;
use App\Models\Promotion;
use Illuminate\Http\Request;

class SendPromotionController extends Controller
{
    public function index()
    {
        $sendPromotions = SendPromotion::with(['customer', 'promotion'])->get();
        return view('admin.send_promotions.index', compact('sendPromotions'));
    }

    public function create()
    {
        $customers = Customer::all();
        $promotions = Promotion::all();
        return view('admin.send_promotions.create', compact('customers', 'promotions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'promotion_id' => 'required|exists:promotions,id',
        ]);

        SendPromotion::create($request->all());
        return redirect()->route('send-promotions.index')->with('success', 'Promosi berhasil dikirim.');
    }

    public function edit(SendPromotion $sendPromotion)
    {
        $customers = Customer::all();
        $promotions = Promotion::all();
        return view('admin.send_promotions.edit', compact('sendPromotion', 'customers', 'promotions'));
    }

    public function update(Request $request, SendPromotion $sendPromotion)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'promotion_id' => 'required|exists:promotions,id',
        ]);

        $sendPromotion->update($request->all());
        return redirect()->route('send-promotions.index')->with('success', 'Data pengiriman promosi berhasil diperbarui.');
    }

    public function destroy(SendPromotion $sendPromotion)
    {
        $sendPromotion->delete();
        return redirect()->route('send-promotions.index')->with('success', 'Data pengiriman promosi berhasil dihapus.');
    }
}