<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BungaBucketSeeder extends Seeder
{
    public function run()
    {
        DB::table('bunga_bucket')->insert([
            'nama_bunga' => 'Rose Bouquet',
            'deskripsi' => 'A beautiful bouquet of red roses.',
            'harga' => 25000,
            'stok' => 10,
        ]);

        // Tambahkan data bunga lainnya jika diperlukan

        DB::table('bunga_bucket')->insert([
            'nama_bunga' => 'Lavender Bouquet',
            'deskripsi' => 'A beautiful bouquet of Purple Lavender.',
            'harga' => 25000,
            'stok' => 10,
        ]);

        DB::table('bunga_bucket')->insert([
            'nama_bunga' => 'Peony Bouquet',
            'deskripsi' => 'A beautiful bouquet of Peony.',
            'harga' => 25000,
            'stok' => 10,
        ]);

        DB::table('bunga_bucket')->insert([
            'nama_bunga' => 'Lily Bouquet',
            'deskripsi' => 'A beautiful bouquet of Lily.',
            'harga' => 25000,
            'stok' => 10,
        ]);

        DB::table('bunga_bucket')->insert([
            'nama_bunga' => 'Chrysanthemum Bouquet',
            'deskripsi' => 'A beautiful bouquet of Chrysanthemum.',
            'harga' => 25000,
            'stok' => 10,
        ]);
    }
}
