
@extends('kasir.layouts.layout')

@section('title', 'Kasir')

@section('content')

    <section class="right pad2 flex align-center" id="style-2">
            <h1>Dashboard</h1>
            <div class="w100 h100 flex py20 relative" style="background-color: white;">
                <div class="box2 bwhite flex align-center py10">
                    <p class="mx20">Logo </p>
                    <p>Jumlah User</p>
                </div>
                <div class="box2 bwhite flex align-center py10">
                    <p class="mx20">Logo </p>
                    <p>Jumlah Konselor</p>
                </div>
            </div>

            <h1 class="pad2 pt10">Daftar Order</h1>
            <table style="max-width: 100%; margin: 0 auto; padding: 20px; border-radius: 20px;">
                <thead>
                  <tr style="height: 60px;">
                    <th>Nama Lengkap</th>
                    <th>Email</th>
                    <th>Nomor Telepon</th>
                    <th>Paket Laundry</th>
                    <th>Jenis Cucian</th>
                    <th>Berat Cucian</th>
                    <th>Catatan Tambahan</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  <tr style="height: 60px;">
                    <td>John Doe</td>
                    <td>johndoe@example.com</td>
                    <td>1234567890</td>
                    <td>Paket 1: Cuci Reguler</td>
                    <td>Pakaian</td>
                    <td>2 kg</td>
                    <td>-</td>
                    <td>
                        <button style="border: none; padding: 10px 10px; background-color: rgb(249, 249, 72); border-radius: 10px;">Konfirmasi Pesanan</button>
                    </td>
                </tr>
                <tr style="height: 60px;">
                    <td>Jane Smith</td>
                    <td>janesmith@example.com</td>
                    <td>0987654321</td>
                    <td>Paket 2: Cuci Kilat</td>
                    <td>Selimut</td>
                    <td>3.5 kg</td>
                    <td>Harap jaga kelembutan selimut</td>
                    <td>
                        <button style="border: none; padding: 10px 10px; background-color: rgb(249, 249, 72); border-radius: 10px;">Konfirmasi Pesanan</button>
                    </td>
                  </tr>
                  <!-- Add more rows for each booking -->
                </tbody>
              </table>


            </section>
        </div>
@endsection
