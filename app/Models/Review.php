<?php

namespace App\Models;

use CodeIgniter\Model;

class Review extends Model
{
	protected $table                = 'review';
	protected $allowedFields        = ['food_id', 'user_id', 'comment'];

	// Dates
	protected $useTimestamps        = true;
}
