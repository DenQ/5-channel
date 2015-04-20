<?php

class UserIdentity extends CUserIdentity {

	private $_id;

	public function authenticate() {
		$model = User::model()->findByAttributes(array('login' => $this->username));
		if ($model === null)
			$this->errorCode = self::ERROR_USERNAME_INVALID;
		else if($model->password!==crypt($this->password, $model->salt))
			$this->errorCode = self::ERROR_PASSWORD_INVALID;
		else {
			$this->_id = $model->id;
			$this->setState('role', $model->role);
			$this->errorCode = self::ERROR_NONE;
		}
		return !$this->errorCode;
	}

	public function getId() {
		return $this->_id;
	}

}