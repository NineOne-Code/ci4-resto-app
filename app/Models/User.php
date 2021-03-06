<?php

namespace App\Models;

use CodeIgniter\Model;

class User extends Model
{
	protected $table                = 'user';
	protected $allowedFields        = ['name', 'gender'];

	// Dates
	protected $useTimestamps        = true;
}
