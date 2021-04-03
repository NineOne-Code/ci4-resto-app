<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

use CodeIgniter\I18n\Time;

class FoodSeeder extends Seeder
{
	public function run()
	{
		$name = [
			'Sate Kambing', 'Rujak',
			'Soto Ayam', 'Soto Betawi', 'Sop Ayam'
		];
		$image = [
			'sate-kambing.jpg', 'rujak.jpg',
			'soto-ayam.jpg', 'soto-betawi.jpg', 'sop-ayam.jpg'
		];
		for ($i = 0; $i < 5; $i++) {
			$data = [
				'name' => $name[$i],
				'price'    => round((rand(2, 6) + 5) * 1.0725, 2),
				'image'    => $image[$i],
				'created_at' => Time::createFromTimestamp(static::faker()->unixTime()),
				'updated_at' => Time::now()
			];
			$this->db->table('food')->insert($data);
		}
	}
}
