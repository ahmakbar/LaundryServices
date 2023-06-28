<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerOrderStoreRequest;
use App\Models\Order;
use App\Models\PaketLaundry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CustomerOrderStoreRequest $request)
    {
        $paketLaundry = PaketLaundry::where('paket_laundry_id', $request->paket_laundry_id)->first();

        $order = Order::create([
            'order_id' => rand(),
            'jenis' => $request->jenis,
            'berat' => $request->berat,
            'user_id' => Auth::user()->user_id,
            'paket_laundry_id' => $request->paket_laundry_id,
            'harga_total' => $request->berat * $paketLaundry->harga_per_kilo,
        ]);

        return redirect()
            ->route('customer.index')
            ->with('success', 'Order berhasil dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
