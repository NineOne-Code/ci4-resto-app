<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

use CodeIgniter\I18n\Time;

class UserSeeder extends Seeder
{
	public function run()
	{
		for ($i = 0; $i < 50; $i++) {
			$data = [
				'name' => static::faker()->name('male'),
				'gender'    => 'male',
				'created_at' => Time::createFromTimestamp(static::faker()->unixTime()),
				'updated_at' => Time::now()
			];
			$this->db->table('user')->insert($data);
		}
		for ($i = 0; $i < 50; $i++) {
			$data = [
				'name' => static::faker()->name('female'),
				'gender'    => 'female',
				'created_at' => Time::createFromTimestamp(static::faker()->unixTime()),
				'updated_at' => Time::now()
			];
			$this->db->table('user')->insert($data);
		}
	}
}
