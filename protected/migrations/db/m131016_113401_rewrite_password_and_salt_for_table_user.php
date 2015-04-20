<?php

/**
 * Миграция m131016_113401_rewrite_password_and_salt_for_table_user
 *
 */
class m131016_113401_rewrite_password_and_salt_for_table_user extends QMigrate{
	
	private $tablename = 'user';
	
	public function safeUp() {
		$this->updatePassword('admin');
		$this->updatePassword('moder');
		$this->updatePassword('user');
	}

	public function safeDown() {
		$this->updatePAsswordDown('admin');
		$this->updatePAsswordDown('moder');
		$this->updatePAsswordDown('user');
	}
	
	private function updatePassword($login) {
		$this->update($this->tablename, array(
			'password'=>  crypt($login, md5($login)),
			'salt'=>  md5($login),
		), 'login="'.$login.'"');
	}
	
	private function updatePAsswordDown($login) {
		$this->update($this->tablename, array(
			'password'=>  md5($login),
			'salt'=>  '',
		), 'login="'.$login.'"');
	}
}