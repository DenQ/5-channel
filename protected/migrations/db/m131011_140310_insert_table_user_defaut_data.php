<?php

class m131011_140310_insert_table_user_defaut_data extends CDbMigration {

	private $tablename = 'user';

	public function safeUp() {

		$this->truncateTable($this->tablename);

		$this->insert($this->tablename, array(
			'role' => 'admin',
			'login' => 'admin',
			'password' => md5('admin'),
			'dt_create' => '2013-10-10 17:03:35',
		));

		$this->insert($this->tablename, array(
			'role' => 'moder',
			'login' => 'moder',
			'password' => md5('moder'),
		));

		$this->insert($this->tablename, array(
			'role' => 'user',
			'login' => 'user',
			'password' => md5('user'),
		));
	}

	public function safeDown() {
		$this->truncateTable($this->tablename);
	}

}