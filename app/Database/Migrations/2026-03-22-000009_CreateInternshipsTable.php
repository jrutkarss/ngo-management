<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateInternshipsTable extends Migration
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
            'title' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'description' => [
                'type' => 'TEXT',
            ],
            'duration_weeks' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'positions_available' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'start_date' => [
                'type' => 'DATE',
            ],
            'stipend' => [
                'type' => 'DECIMAL',
                'constraint' => [10, 2],
                'null' => true,
            ],
            'image_path' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['open', 'closed', 'ongoing', 'completed'],
                'default' => 'open',
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
        $this->forge->createTable('internships');
    }

    public function down()
    {
        $this->forge->dropTable('internships');
    }
}
