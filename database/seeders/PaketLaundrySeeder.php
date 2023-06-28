<?php

namespace Database\Seeders;

use App\Models\PaketLaundry;
use Illuminate\Database\Seeder;

class PaketLaundrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $paket = PaketLaundry::create([
            'paket_laundry_id' => rand(),
            'nama_paket' => 'Cuci Reguler',
            'harga_per_kilo' => 4000,
            'durasi_paket' => 3,
        ]);

        $paket = PaketLaundry::create([
            'paket_laundry_id' => rand(),
            'nama_paket' => 'Cuci Kilat',
            'harga_per_kilo' => 7500,
            'durasi_paket' => 3,
        ]);

        $paket = PaketLaundry::create([
            'paket_laundry_id' => rand(),
            'nama_paket' => 'Cuci Express',
            'harga_per_kilo' => 10000,
            'durasi_paket' => 3,
        ]);
    }
}
