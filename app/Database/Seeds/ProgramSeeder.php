<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProgramSeeder extends Seeder
{
    public function run()
    {
        $programModel = new \App\Models\ProgramModel();
        $achievementModel = new \App\Models\AchievementModel();

        // Academic Programs
        $academicData = [
            [
                'type' => 'academic',
                'title' => 'Fokus STEM',
                'slug' => 'fokus-stem',
                'description' => 'Menekankan penguasaan Sains, Teknologi, Rekayasa, dan Matematika dengan metode eksperimen langsung (hands-on learning).',
                'content' => '<p>Program STEM kami dirancang untuk membekali siswa dengan keterampilan abad ke-21. Melalui laboratorium modern dan kurikulum berbasis proyek, siswa belajar memecahkan masalah nyata dunia teknologi dan sains.</p><ul><li>Laboratorium Robotika Canggih</li><li>Kurikulum Coding Terintegrasi</li><li>Eksperimen Sains mingguan</li></ul>',
                'icon' => 'fas fa-microscope',
                'order_rank' => 1
            ],
            [
                'type' => 'academic',
                'title' => 'Kemampuan Bahasa',
                'slug' => 'kemampuan-bahasa',
                'description' => 'Program bilingual (Indonesia-Inggris) untuk membekali siswa dengan kemampuan komunikasi lintas budaya yang lancar.',
                'content' => '<p>Kami percaya bahwa penguasaan bahasa adalah kunci gerbang dunia. Program bilingual kami menggunakan bahasa Inggris dalam mata pelajaran inti tertentu untuk membiasakan siswa berkomunikasi secara internasional.</p>',
                'icon' => 'fas fa-language',
                'order_rank' => 2
            ],
            [
                'type' => 'academic',
                'title' => 'Pengembangan Karakter',
                'slug' => 'pengembangan-karakter',
                'description' => 'Pendidikan berbasis nilai yang menumbuhkan disiplin, integritas, dan rasa empati pada sesama.',
                'content' => '<p>Bukan hanya akademik, kami berkomitmen membentuk pribadi yang berakhlak mulia. Melalui sesi harian dan program pengabdian masyarakat, siswa diajarkan nilai-nilai kejujuran, kerja keras, dan kasih sayang.</p>',
                'icon' => 'fas fa-chess',
                'order_rank' => 3
            ]
        ];

        // Extracurricular Programs
        $extraData = [
            [
                'type' => 'extracurricular',
                'category' => 'Olahraga',
                'title' => 'Basket',
                'slug' => 'bola-basket',
                'description' => 'Membangun kesehatan fisik, disiplin, dan sportivitas melalui tim unggulan sekolah.',
                'content' => '<p>Klub basket kami adalah salah satu yang tersohor di provinsi. Dengan pelatih profesional dan lapangan indoor berstandar nasional, kami membina atlet-atlet muda berbakat untuk berprestasi di tingkat nasional.</p><p>Jadwal Latihan: Selasa & Kamis (15:30 - 17:30)</p>',
                'icon' => 'fas fa-basketball-ball',
                'tags' => 'Basket, Tim Putra, Tim Putri',
                'image' => 'https://images.unsplash.com/photo-1546519638-68e109498ffc?q=80&w=2090&auto=format&fit=crop',
                'order_rank' => 1
            ],
            [
                'type' => 'extracurricular',
                'category' => 'Seni & Budaya',
                'title' => 'Seni Musik',
                'slug' => 'seni-musik',
                'description' => 'Mengekspresikan kreativitas dan melestarikan budaya melalui berbagai cabang kesenian.',
                'content' => '<p>Unit Seni Musik membawahi berbagai kelompok seperti Band, Ansambel, dan Paduan Suara. Kami menyediakan studio musik kedap suara dan alat-alat musik berkualitas tinggi untuk mendukung bakat siswa.</p>',
                'icon' => 'fas fa-paint-brush',
                'tags' => 'Band, Paduan Suara, Ansambel',
                'image' => 'https://images.unsplash.com/photo-1511379938547-c1f69419868d?q=80&w=2070&auto=format&fit=crop',
                'order_rank' => 2
            ],
            [
                'type' => 'extracurricular',
                'category' => 'Sains & Teknologi',
                'title' => 'Robotika',
                'slug' => 'klub-robotika',
                'description' => 'Menyongsong masa depan dengan penguasaan teknologi mutakhir dan eksplorasi ilmiah.',
                'content' => '<p>Klub Robotika adalah tempat berkumpulnya para peminat teknologi. Di sini siswa belajar merakit dan memproses data sensor menggunakan mikrokontroler untuk menciptakan inovasi robotik masa depan.</p>',
                'icon' => 'fas fa-robot',
                'tags' => 'Arduino, Lego Mindstorms, Coding',
                'image' => 'https://images.unsplash.com/photo-1485827404703-89b55fcc595e?q=80&w=2070&auto=format&fit=crop',
                'order_rank' => 3
            ]
        ];

        // Insert Programs and Get IDs
        foreach ($academicData as $prog) {
            $programModel->insert($prog);
        }

        $basketId = $programModel->insert($extraData[0]);
        $musikId = $programModel->insert($extraData[1]);
        $robotId = $programModel->insert($extraData[2]);

        // Achievements Linked to Programs
        $achievementData = [
            [
                'program_id' => $basketId,
                'title' => 'Juara 1 Kejuaraan Basket Provinsi',
                'description' => 'Tim putra berhasil mempertahankan gelar juara selama 3 tahun berturut-turut.',
                'icon' => 'fas fa-trophy',
                'date_event' => 'Desember 2023',
                'color' => '#F59E0B'
            ],
            [
                'program_id' => $musikId,
                'title' => 'Gold Award - Jakarta Youth Music Festival',
                'description' => 'Grup band sekolah terpilih sebagai penampilan terbaik dari 100 peserta se-Indonesia.',
                'icon' => 'fas fa-guitar',
                'date_event' => 'November 2023',
                'color' => '#3B82F6'
            ],
            [
                'program_id' => $robotId,
                'title' => 'The Best Innovative Robot - World Robot Games',
                'description' => 'Klub Robotika memenangkan penghargaan internasional atas inovasi robot pemilah sampah.',
                'icon' => 'fas fa-microchip',
                'date_event' => 'Agustus 2023',
                'color' => '#10B981'
            ],
            [
                'program_id' => $musikId,
                'title' => 'Juara 2 Lomba Tari Tradisional Nasional',
                'description' => 'Tim tari berhasil memukau juri dengan aransemen tari kolosal perpaduan adat Nusantara.',
                'icon' => 'fas fa-palette',
                'date_event' => 'Oktober 2023',
                'color' => '#EC4899'
            ]
        ];

        foreach ($achievementData as $achievement) {
            $achievementModel->insert($achievement);
        }
    }
}
