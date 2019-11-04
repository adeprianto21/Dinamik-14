<?php

use Illuminate\Database\Seeder;
use App\Competition;

class CompetitionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('competitions')->insert([
            'nama_competition' => 'PC Assembling',
            'singkatan' => 'PCA',
            'jumlah_peserta' => 1,
            'biaya_pendaftaran' => 100000,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('competitions')->insert([
            'nama_competition' => 'Networking Competition',
            'singkatan' => 'Net Comp',
            'jumlah_peserta' => 1,
            'biaya_pendaftaran' => 100000,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('competitions')->insert([
            'nama_competition' => 'Computer Science Programming Contest',
            'singkatan' => 'CSPC',
            'jumlah_peserta' => 1,
            'biaya_pendaftaran' => 150000,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('competitions')->insert([
            'nama_competition' => 'Web Development',
            'singkatan' => 'Web Dev',
            'jumlah_peserta' => 3,
            'biaya_pendaftaran' => 150000,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('competitions')->insert([
            'nama_competition' => 'Animation Contest',
            'singkatan' => 'Animation',
            'jumlah_peserta' => 3,
            'biaya_pendaftaran' => 150000,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
