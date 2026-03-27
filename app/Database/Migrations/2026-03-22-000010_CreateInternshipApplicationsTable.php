<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateInternshipApplicationsTable extends Migration
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
            'internship_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'student_name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'student_email' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'student_phone' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'resume_path' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'cover_letter' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['applied', 'accepted', 'rejected', 'completed'],
                'default' => 'applied',
            ],
            'completion_certificate_path' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
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
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('internship_id', 'internships', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('internship_applications');
    }

    public function down()
    {
        $this->forge->dropTable('internship_applications');
    }
}
