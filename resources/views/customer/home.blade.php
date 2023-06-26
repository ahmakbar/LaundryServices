
@extends('layout/nav')

@section('title', 'Home')

@section('content')
    <section class="sect1 flex justify-center align-center justify-around" id="head">
        <div class="title flex justify-center column" style="">
            <p class="title-head" style="">QuickCare</p>
            <p class="headline-head" style="">Solusi Praktis dan Cepat untuk Semua Kebutuhan Laundry Anda!</p>
        </div>
        <div class="img-head flex justify-center column" style="">
            <img style="object-fit: contain;" src="assets/images/laundryhead.png" alt="">
        </div>

    </section>
    <section class="sect1 flex justify-center align-center column">
        <p class="mx10" style="font-size: 40px; font-weight: bold;" id="cuci">Pemesanan Laundry</p>
        <form action="submit.php" method="post" class="flex column align-center" style="width: 80%;">
            <div class="form-cuci flex" style="width: 100%;">
                <div class="input-form-cuci form-group mx20" style="">
                    <label for="name">Nama Lengkap</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="input-form-cuci form-group mx20" style="">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>
            </div>
            <div class="form-cuci flex" style="width: 100%;">
                <div class="input-form-cuci form-group mx20" style="">
                    <label for="phone">Nomor Telepon</label>
                    <input type="tel" id="phone" name="phone" required>
                </div>
                <div class="input-form-cuci input-select form-group mx20">
                    <label for="package">Pilih Paket Laundry</label>
                    <select id="package" name="package" required>
                    <option value="" disabled selected>Pilih Paket</option>
                    <option value="paket-1">Paket 1: Cuci Reguler</option>
                    <option value="paket-2">Paket 2: Cuci Kilat</option>
                    <option value="paket-3">Paket 3: Cuci Express</option>
                    </select>
                </div>
            </div>
            <div class="form-cuci flex" style="width: 100%;">
                <div class="input-form-cuci form-group mx20" style="">
                    <label for="laundry-type">Jenis Cucian</label>
                    <input type="text" id="laundry-type" name="laundry-type" required>
                </div>
                <div class="input-form-cuci form-group mx20" style="">
                    <label for="laundry-weight">Berat Cucian (dalam kilogram)</label>
                    <input type="number" id="laundry-weight" style="width: 100%; padding: 10px;" name="laundry-weight" min="1" required>
                </div>
            </div>
            <div class="form-textarea flex align-center" style="">
                <div class="form-group" style="">
                    <label for="notes">Catatan Tambahan</label>
                    <textarea id="notes" name="notes"></textarea>
                </div>
            </div>
        <button type="submit">Submit</button>
        </form>
    </section>
@endsection
