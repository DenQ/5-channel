<?php

class UserBehavior extends CModelBehavior {
	
	public function events() {
		parent::events();
		return array(
			'onEmails'=>'emails',
			'onLogins'=>'logins',
		);
	}

	public function emails() {
		$owner = $this->getOwner();
		if (!$owner->hasErrors()) {
			$count = User::model()->count('email= :email', array(
				':email' => $owner->email
			));
			if ($count > 0) {
				$owner->addError('email', 'Пользователь с таким email уже зарегистрирован!');
			}
		}
	}
	
	public function logins() {
		$owner = $this->getOwner();
		if (!$owner->hasErrors()) {
			$count = User::model()->count('login = :login', array(
				':login' => $owner->login
			));
			if ($count > 0) {
				$owner->addError('login', 'Такой пользователь уже зарегистрирован!');
			}
		}
	}


}