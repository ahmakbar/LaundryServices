@extends('layout/nav')

@section('title', 'Riwayat')

@section('content')
    <section class="sect1 flex justify-center align-center justify-around" id="head">
        <div class="title flex justify-center column" style="">
            <p class="title-head" style="">QuickCare</p>
            <p class="headline-head" style="">Riwayat Pemesanan</p>
        </div>
        <div class="img-head flex justify-center column" style="">
            <img style="object-fit: contain;" src="assets/images/laundryhead.png" alt="">
        </div>

    </section>
    <section class="sect1 flex align-center column" style="">
        <p class="mx10" style="font-size: 40px; font-weight: bold;">Data Pemesanan</p>
        <table style="max-width: 80%; margin: 0 auto; padding: 20px; border-radius: 20px;">
            <thead>
                <tr style="">
                <th>Nama Lengkap</th>
                <th>Email</th>
                <th>Nomor Telepon</th>
                <th>Paket Laundry</th>
                <th>Jenis Cucian</th>
                <th>Berat Cucian</th>
                <th>Catatan Tambahan</th>
                </tr>
            </thead>
            <tbody>
                <tr style="">
                <td>John Doe</td>
                <td>johndoe@example.com</td>
                <td>1234567890</td>
                <td>Paket 1: Cuci Reguler</td>
                <td>Pakaian</td>
                <td>2 kg</td>
                <td>-</td>
                </tr>
                <tr style="">
                <td>Jane Smith</td>
                <td>janesmith@example.com</td>
                <td>0987654321</td>
                <td>Paket 2: Cuci Kilat</td>
                <td>Selimut</td>
                <td>3.5 kg</td>
                <td>Harap jaga kelembutan selimut</td>
                </tr>
                <!-- Add more rows for each booking -->
            </tbody>
            </table>
    </section>
@endsection
