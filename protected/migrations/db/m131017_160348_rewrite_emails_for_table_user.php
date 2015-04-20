<?php

/**
 * Миграция m131017_160348_rewrite_emails_for_table_user
 *
 */
class m131017_160348_rewrite_emails_for_table_user extends QMigrate{
	
	private $tablename = 'user';
	
	public function safeUp() {
		$this->updateEmail('admin');
		$this->updateEmail('moder');
		$this->updateEmail('user');
	}

	public function safeDown() {
		$this->updateEmailDown('admin');
		$this->updateEmailDown('moder');
		$this->updateEmailDown('user');
	}
	
	private function updateEmail($login) {
		$this->update($this->tablename, array(
			'email'=> $login.'@gmail.com',
		), 'login="'.$login.'"');
	}
	
	private function updateEmailDown($login) {
		$this->update($this->tablename, array(
			'email'=> null,
		), 'login="'.$login.'"');
	}
}