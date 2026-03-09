<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class PendaftaranFakerSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create('id_ID'); // Use Indonesian locale
        $pendaftaranModel = new \App\Models\PendaftaranModel();

        $jenjangs = ['SD', 'SMP', 'SMA'];
        $jk = ['L', 'P'];

        for ($i = 0; $i < 50; $i++) {
            $pendaftaranModel->save([
                'nama_lengkap' => $faker->name,
                'tempat_lahir' => $faker->city,
                'tanggal_lahir' => $faker->date('Y-m-d', '2015-01-01'),
                'jenis_kelamin' => $jk[array_rand($jk)],
                'jenjang' => $jenjangs[array_rand($jenjangs)],
                'nama_wali' => $faker->name,
                'no_wa' => $faker->phoneNumber,
                'email' => $faker->email,
                'alamat' => $faker->address,
                'status' => 'pending'
            ]);
        }
    }
}
