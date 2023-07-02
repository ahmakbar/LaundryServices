<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerOrderStoreRequest;
use App\Models\Order;
use App\Models\PaketLaundry;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class OrderController extends Controller
{
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
            'catatan' => $request->catatan,
        ]);

        return redirect()
            ->route('customer.index')
            ->with('success', 'Order berhasil dibuat');
    }

    public function indexTable()
    {
        $orders = Order::join('users', 'users.user_id', '=', 'orders.user_id')
            ->join('paket_laundries', 'paket_laundries.paket_laundry_id', '=', 'orders.paket_laundry_id')
            ->where('orders.user_id', Auth::user()->user_id)
            ->get();

        return DataTables::of($orders)
            ->addIndexColumn()
            ->addColumn('paket_laundry', function ($row) {
                $paket_laundry = PaketLaundry::where('paket_laundry_id', $row->paket_laundry_id)->first()->nama_paket;
                return $paket_laundry;
            })
            ->addColumn('status', function ($row) {
                if ($row->status == 1) {
                    return 'Selesai';
                } elseif ($row->status == 2) {
                    return 'Diproses';
                } else {
                    return 'Diterima';
                }
            })
            ->addColumn('aksi', 'customer.aksi')
            ->rawColumns(['paket_laundry', 'status', 'aksi'])
            ->make(true);
    }

    public function previewInvoice($id)
    {
        $order = Order::where('order_id', $id)->first();

        $user = User::where('user_id', $order->user_id)->first();

        return view('customer.preview-invoice', ['order' => $order, 'user' => $user]);
    }

    public function printInvoice($id)
    {
        $order = Order::where('order_id', $id)->first();

        $user = User::where('user_id', $order->user_id)->first();

        $pdf = Pdf::loadView('customer.invoice', ['order' => $order, 'user' => $user]);

        return $pdf->download('INVOICE-' . $order->order_id . '.pdf');
    }
}
