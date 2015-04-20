<?php
class UserIdentity extends CUserIdentity {

	public function authenticate() {
		
		$users = $this->searchUser();
		
		if (!isset($users[$this->username])) {
			$this->errorCode = self::ERROR_USERNAME_INVALID;
		} elseif ( $users[$this->username] !== md5($this->password) ) {
			$this->errorCode = self::ERROR_PASSWORD_INVALID;
		} else {
			$this->errorCode = self::ERROR_NONE;
		} return !$this->errorCode;
	}

	private function searchUser() {
		$criteria = new CDbCriteria;
		$criteria->select = 'login, password';
		$criteria->condition = 'login=:login';
		$criteria->params = array(
			':login' => $this->username,
		);
		$result = User::model()->find($criteria);
		
		if ( count($result->attributes) ) {
			return array(
				$result->login => $result->password
			);
		} return array();
	}

}