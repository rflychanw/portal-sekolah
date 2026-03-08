<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePendaftaranSettingsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'is_open' => [
                'type' => 'TINYINT',
                'constraint' => 1,
                'default' => 1,
            ],
            'title' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'default' => 'Pendaftaran Siswa Baru',
            ],
            'description' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'deadline' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('pendaftaran_settings');

        // Insert default settings
        $db = \Config\Database::connect();
        $db->table('pendaftaran_settings')->insert([
            'is_open' => 1,
            'title' => 'Pendaftaran Siswa Baru',
            'description' => 'Mulai perjalanan pendidikan terbaik Anda bersama kami. Proses pendaftaran cepat, transparan, dan terintegrasi.',
        ]);
    }

    public function down()
    {
        $this->forge->dropTable('pendaftaran_settings');
    }
}
