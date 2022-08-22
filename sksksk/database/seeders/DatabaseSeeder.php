<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\myMod;
use App\Models\myModel;
use App\Models\User;
use App\Models\comment;
use Illuminate\Support\Facades\Hash;

// seeder dapat mempermudah menambahkan data pada db tanpa harus menginputkan satu persatu, dan ketika melakukan 
// migrate kita tidak perlu melakukan input data lagi yang hilang satu persatu
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // TABEL SISWA
        // myMod::factory(10)->create();

        // TABEL USER
        // User::factory(10)->create();

        // TABEL POSTINGAN
        // myModel::factory(10)->create();
        
        // TABEL KOMENTAR
        // comment::factory(20)->create();

        // for($i = 1; $i <= 10; $i++){
        //     comment::create([
        //         'body' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled ',
        //         'user_id' => mt_rand(1,10),
        //         'post_id' => $i
        //     ]);
            
        // }

        myModel::create([
            "username" => "admin123",
            "email" => "mhadn29@gmail.com",
            "role" => "admin",
            "images" => null,
            "password" => Hash::make("admin123")
        ]);

        // myMod::create([
        //     'nama' => 'bambang',
        //     'nisn' => '002',
        //     'no_telfon' => '082131439229'
        // ]);

        // myMod::create([
        //     'nama' => 'nanang',
        //     'nisn' => '003',
        //     'no_telfon' => '082131439229'
        // ]);

        // myMod::create([
        //     'nama' => 'indy',
        //     'nisn' => '004',
        //     'no_telfon' => '082131439229'
        // ]);
    }
}
