<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>INVOICE {{ $order->order_id }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</head>

<style>
    table,
    th,
    td {
        border: 1px solid black;
        border-collapse: collapse;
    }
</style>

<body>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-4 mb-3">
                <h1 class="text-center">INVOICE {{ $order->order_id }}</h1>
            </div>
        </div>
        <div class="row d-flex justify-content-start">
            <div class="col-4 mb-3">
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Nama Customer</td>
                                <td>:</td>
                                <td>{{ $user->name }}</td>
                            </tr>
                            <tr>
                                <td>Nomor HP</td>
                                <td>:</td>
                                <td>{{ $user->nomor_hp ?? '' }}</td>
                            </tr>
                            <tr>
                                <td>Tanggal Order</td>
                                <td>:</td>
                                <td>{{ $order->created_at->format('d-m-Y H-i-s') }}</td>
                            </tr>
                            <tr>
                                <td>Tanggal Cetak Invoice</td>
                                <td>:</td>
                                <td>{{ Carbon\Carbon::now()->format('d-m-Y H-i-s') }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-4 mb-3">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="text-center">
                            <tr class="fw-bold">
                                <td>Paket Laundry</td>
                                <td>Kuantitas</td>
                                <td>Harga Per Kg</td>
                                <td>Harga Total</td>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <tr>
                                <td>{{ App\Models\PaketLaundry::where('paket_laundry_id', $order->paket_laundry_id)->first()->nama_paket }}
                                </td>
                                <td>{{ $order->berat }}
                                </td>
                                <td>{{ App\Models\PaketLaundry::where('paket_laundry_id', $order->paket_laundry_id)->first()->harga_per_kilo }}
                                </td>
                                <td>{{ $order->harga_total }}</td>
                            </tr>
                            <tr>
                                <td colspan="3" class="fw-bold">Harga Total</td>
                                <td>{{ $order->harga_total }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
