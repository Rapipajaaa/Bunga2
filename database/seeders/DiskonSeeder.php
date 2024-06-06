<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiskonSeeder extends Seeder
{
    public function run()
    {
        DB::table('diskon')->insert([
            'persentase_diskon' => 10.00,
        ]);

        // Tambahkan data diskon lainnya jika diperlukan
    }
}
