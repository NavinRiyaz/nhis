<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class UserMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'SERIAL',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'username' => [
                'type' => 'CHARACTER VARYING',
                'constraint' => 150,
                'null' => false,
            ],
            'email' => [
                'type' => 'CHARACTER VARYING',
                'constraint' => 150,
                'null' => true,
            ],
            'password' => [
                'type' => 'CHARACTER VARYING',
                'constraint' => 250,
                'null' => false,
            ],
            'device_id' => [
                'type' => 'CHARACTER VARYING',
                'constraint' => 250,
                'null' => true,
            ],
            'role' => [
                'type' => 'CHARACTER VARYING',
                'constraint' => 150,
                'null' => false,
                'comment' => 'SUPER, DISTRICT, STATE, HIGH, UIIC, ADMIN',
                'check' => 'role IN (\'SUPER\', \'DISTRICT\', \'STATE\', \'HIGH\', \'UIIC\', \'ADMIN\')',
            ],
            'status' => [
                'type' => 'CHARACTER VARYING',
                'constraint' => 5,
                'null' => false,
            ],
            'created_at' => [
                'type' => 'TIMESTAMP',
                'default' => new RawSql('CURRENT_TIMESTAMP')
            ],
            'updated_at' => [
                'type' => 'TIMESTAMP',
                'default' => new RawSql('CURRENT_TIMESTAMP')
            ],
            'deleted_at' => [
                'type' => 'TIMESTAMP',
                'default' => new RawSql('CURRENT_TIMESTAMP')
            ],

        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('users');
    }

    public function down()
    {
        //
    }
}
