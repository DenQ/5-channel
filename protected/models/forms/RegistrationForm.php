<?php

class RegistrationForm extends CFormModel {

	public $login;
	public $password;
	public $password1;
	public $email;
	public $verifyCode;

	public function rules() {
		return array(
			array('login, password, password1, email', 'required'),
			array('login', 'length', 'max' => 64, 'min' => 3),
			array('email', 'length', 'max' => 64),
			array('password, password1', 'length', 'max' => 64, 'min' => 6),
			array('password1', 'compare', 'compareAttribute' => 'password'),
			array('email', 'email'),
			array('verifyCode', 'captcha', 'allowEmpty' => !CCaptcha::checkRequirements()),
			

			array('login', 'logins'),
			array('email', 'emails'),
		);
	}

	public function attributeLabels() {
		return array(
			'verifyCode' => 'Проверка на человека',
		);
	}

	

	public function emails($attribute, $params) {
		$event = new CModelEvent($this);
		$this->onEmails($event);
	}
	
	public function logins($attribute, $params) {
		$event = new CModelEvent($this);
		$this->onLogins($event);
	}

	public function onEmails($event) {
		$this->raiseEvent('onEmails', $event);
	}
	
	public function onLogins($event) {
		$this->raiseEvent('onLogins', $event);
	}
	
	
	
	

	//TODO: запилить это на уровне behavira в модели ar/User
	public function registration($data) {
		
		$model = new UserCustom;
		
		$salt = md5($data['login']);
		$model->login = $data['login'];
		$model->email = $data['email'];
		$model->password = crypt( $data['password'], $salt );
		$model->salt = $salt;

		return $model->save();
	}
	



	public function behaviors() {
		return array(
			'UserBehavior' => array(
				'class' => 'UserBehavior',
			)
		);
	}
	
}