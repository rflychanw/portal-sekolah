<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProgramsAndAchievements extends Migration
{
    public function up()
    {
        // Programs Table (For Academics and Extracurricular Clubs)
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'type' => [
                'type' => 'ENUM',
                'constraint' => ['academic', 'extracurricular'],
                'default' => 'academic',
            ],
            'category' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
            ],
            'title' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'description' => [
                'type' => 'TEXT',
            ],
            'icon' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
            ],
            'tags' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'image' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'order_rank' => [
                'type' => 'INT',
                'constraint' => 11,
                'default' => 0,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('programs');

        // Achievements Table
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'title' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'description' => [
                'type' => 'TEXT',
            ],
            'icon' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
            ],
            'date_event' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
            ],
            'color' => [
                'type' => 'VARCHAR',
                'constraint' => '20',
                'null' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('achievements');
    }

    public function down()
    {
        $this->forge->dropTable('programs');
        $this->forge->dropTable('achievements');
    }
}
