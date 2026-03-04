<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddTeacherIdToArticles extends Migration
{
    public function up()
    {
        $this->forge->addColumn('articles', [
            'teacher_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true,
                'after' => 'status',
            ],
        ]);

        // Add foreign key
        $this->db->query("ALTER TABLE articles ADD CONSTRAINT fk_articles_teacher FOREIGN KEY (teacher_id) REFERENCES teachers(id) ON DELETE SET NULL ON UPDATE CASCADE");
    }

    public function down()
    {
        $this->forge->dropForeignKey('articles', 'fk_articles_teacher');
        $this->forge->dropColumn('articles', 'teacher_id');
    }
}
