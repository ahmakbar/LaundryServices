<?php

namespace App\Http\Controllers;

use App\Models\PaketLaundry;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PaketLaundryController extends Controller
{
    public function index()
    {
        return view('paket_laundry.index');
    }

    public function indexTable()
    {
        $paketLaundry = PaketLaundry::query();

        return DataTables::of($paketLaundry)
            ->addColumn('action', function ($paketLaundry) {
                $editUrl = route('paket_laundry.edit', $paketLaundry->id);
                $deleteUrl = route('paket_laundry.destroy', $paketLaundry->id);
                return '<a href="' .
                    $editUrl .
                    '" class="btn btn-sm btn-primary">Edit</a>
                        <form action="' .
                    $deleteUrl .
                    '" method="POST" style="display: inline-block;">
                            ' .
                    csrf_field() .
                    '
                            ' .
                    method_field('DELETE') .
                    '
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>';
            })
            ->make(true);
    }

    public function create()
    {
        return view('paket_laundry.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'paket_laundry_id' => 'required|unique:paket_laundries',
            'nama_paket' => 'required',
            'harga_per_kilo' => 'required|numeric',
            'durasi_paket' => 'nullable|integer',
        ]);

        PaketLaundry::create($request->all());

        return redirect()
            ->route('paket_laundry.index')
            ->with('success', 'Paket Laundry created successfully.');
    }

    public function edit(PaketLaundry $paketLaundry)
    {
        return view('paket_laundry.edit', compact('paketLaundry'));
    }

    public function update(Request $request, PaketLaundry $paketLaundry)
    {
        $request->validate([
            'paket_laundry_id' => 'required|unique:paket_laundries,paket_laundry_id,' . $paketLaundry->id,
            'nama_paket' => 'required',
            'harga_per_kilo' => 'required|numeric',
            'durasi_paket' => 'nullable|integer',
        ]);

        $paketLaundry->update($request->all());

        return redirect()
            ->route('paket_laundry.index')
            ->with('success', 'Paket Laundry updated successfully.');
    }

    public function destroy(PaketLaundry $paketLaundry)
    {
        $paketLaundry->delete();

        return redirect()
            ->route('paket_laundry.index')
            ->with('success', 'Paket Laundry deleted successfully.');
    }
}
