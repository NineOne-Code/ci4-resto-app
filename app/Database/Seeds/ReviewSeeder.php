<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

use App\Models\Review;
use App\Models\User;
use App\Models\Food;

use CodeIgniter\I18n\Time;

class ReviewSeeder extends Seeder
{
	public function run()
	{
		$userModel = new User();
		$users = $userModel->findAll();
		$foodModel = new Food();
		$foods = $foodModel->findAll();
		$count = 0;
		for ($i = 0; $i < 5; $i++) {
			for ($j = 0; $j < 20; $j++) {
				$data = [
					'food_id' => $foods[$i]['id'],
					'user_id' => $users[$count++]['id'],
					'comment'    => static::faker()->address,
					'created_at' => Time::createFromTimestamp(static::faker()->unixTime()),
					'updated_at' => Time::now()
				];
				$this->db->table('review')->insert($data);
			}
		}
	}
}
