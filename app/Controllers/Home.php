<?php

namespace App\Controllers;

use App\Models\Food;
use App\Models\Review;
use App\Models\User;

class Home extends BaseController
{
	protected $foodModel;
	protected $reviewModel;
	protected $userModel;
	protected $orders = [];
	public function __construct()
	{
		$this->foodModel = new Food();
		$this->reviewModel = new Review();
		$this->userModel = new User();
	}
	public function index()
	{
		$foods = $this->foodModel->findAll();
		$data = [
			'title' => 'Selamat Datang | Waroeng Pinggiran',
			'foods' => $foods,
			'orders' => $this->orders
		];
		return view('welcome', $data);
	}
	public function detail()
	{
		$id = $this->request->getVar('id');
		$data = $this->foodModel->where(['id' => $id])->first();
		$data['reviews'] = $this->reviewModel->where(['food_id' => $id])->findAll();
		foreach ($data['reviews'] as $review) {
			$data['users'][] = $this->userModel->where(['id' => $review['user_id']])->findAll()[0];
		};
		// $data['users'] = $this->userModel->where(['id' => $temp])->findAll();
		echo json_encode($data);
	}
	public function total()
	{
		$input = $this->request->getVar('data');
		foreach ($input as $item) {
			$data[] = $this->foodModel->where(['id' => $item['id']])->first();
		}
		// $data = $this->foodModel->findAll();
		echo json_encode($data);
	}
	public function reviewers()
	{
		$id = $this->request->getVar('id');
		$data = $this->reviewModel->where(['food_id' => $id])->findAll();
		echo json_encode($data);
	}
}
