<?php

use Illuminate\Database\Seeder;
use App\Admin;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'name' => 'Admin',
            'username' => 'DinaMik14',
            'password' => Hash::make('Pas5Word'),
        ]);
    }
}
