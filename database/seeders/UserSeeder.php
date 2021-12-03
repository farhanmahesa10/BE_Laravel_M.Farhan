<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Profile;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
       $user =  User::create([
            'username' => 'farhan',
            'email' => 'farhanmahesa10@gmail.com',
            'password' => bcrypt(1234),
        ]);

        Profile::create([
            'user_id' => $user->id,
            'alamat_ktp' => 'jakarta',
            'nama_lengkap' => 'M Farhan',
            'pekerjaan' => 'Web Programmer',
            'pendidikan_terakhir' => 'D3',
            'nomor_telpon' => '08997197975',
        ]);
    }
}