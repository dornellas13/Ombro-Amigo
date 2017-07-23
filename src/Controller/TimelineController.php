<?php
namespace App\Controller;
use App\Controller\AppController;

class TimelineController extends AppController
{
	public function index(){
		$this->viewBuilder()->layout('admin');
	}
}