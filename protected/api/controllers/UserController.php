<?php

class UserController extends APIController {

	public function setModel() {
		$this->model = new User();
	}


	public function get() {
		$model = new User();
		$result = $model->findAll();
		
		$this->data = $result;
	}

	public function post() {
		$this->data = 'post';
	}

	public function put() {
		$this->data = 'put';
	}

	public function delete() {
		$this->data = 'delete';
	}
	
}