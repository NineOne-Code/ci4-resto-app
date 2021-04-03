<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Food extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'name'       => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
			],
			'price'       => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
			],
			'image'       => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
			],
			'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
			'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP'
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('food');
	}

	public function down()
	{
		$this->forge->dropTable('food');
	}
}
