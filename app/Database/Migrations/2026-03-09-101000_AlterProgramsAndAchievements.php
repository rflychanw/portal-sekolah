<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterProgramsAndAchievements extends Migration
{
    public function up()
    {
        // Add slug to programs
        $this->forge->addColumn('programs', [
            'slug' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'after' => 'title',
                'unique' => true,
            ],
            'content' => [
                'type' => 'LONGTEXT',
                'null' => true,
                'after' => 'description',
            ],
        ]);

        // Add program_id to achievements
        $this->forge->addColumn('achievements', [
            'program_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true,
                'after' => 'id',
            ],
        ]);

        // Add foreign key if possible, but for simplicity let's skip strict FK for now
    }

    public function down()
    {
        $this->forge->dropColumn('programs', ['slug', 'content']);
        $this->forge->dropColumn('achievements', 'program_id');
    }
}
