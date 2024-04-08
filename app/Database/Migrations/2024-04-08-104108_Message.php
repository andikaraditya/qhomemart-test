<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Message extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'message' => [
                'type'       => 'TEXT',
                'null' => false,
            ]
        ]);
        $this->forge->addKey('id', true); // primary key
        $this->forge->createTable('messages');
    }

    public function down()
    {
        //
    }
}
