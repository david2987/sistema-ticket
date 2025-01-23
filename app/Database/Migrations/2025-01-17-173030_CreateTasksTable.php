<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTasksTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'INT', 'auto_increment' => true],
            'user_id' => ['type' => 'INT'],
            'title' => ['type' => 'VARCHAR', 'constraint' => '255'],
            'description' => ['type' => 'TEXT'],
            'due_date' => ['type' => 'DATETIME'],
            'status' => ['type' => 'ENUM', 'constraint' => ['pendiente', 'en progreso', 'completado'], 'default' => 'pendiente'],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('tasks');
    }

    public function down()
    {
        //
    }
}
