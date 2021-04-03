<?php

namespace App\Models;

use CodeIgniter\Model;

class Food extends Model
{
	protected $table                = 'food';
	protected $allowedFields        = ['name', 'price', 'image'];

	// Dates
	protected $useTimestamps        = true;
}
