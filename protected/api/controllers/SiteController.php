<?php

class SiteController extends APIController {

	public function setModel() {
		$this->model = User::model();
	}


	public function get() {
		$this->data = 'get';
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