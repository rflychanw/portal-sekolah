<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddPasswordToTeachers extends Migration
{
    public function up()
    {
        $this->forge->addColumn('teachers', [
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'after' => 'nip',
                'null' => true,
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('teachers', 'password');
    }
}
