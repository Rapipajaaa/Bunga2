<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PelangganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pelanggan')->insert([
            'nama_pel' => 'Rapip',
            'alamat' => 'Jl.Damai',
            'telepon' => '087884469558',
        ]);

        // Tambahkan data pelanggan lainnya jika diperlukan
    }
}
