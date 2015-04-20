<?php

class m131010_125923_create_table_user extends CDbMigration {

	private $tablename = 'user';
	
	public function safeUp() {
		$this->createTable($this->tablename, array(
			'id'=>'pk',
			'role'=>'VARCHAR(45) not null default \'user\'',
			'login'=>'VARCHAR(50) not null',
			'password'=>'VARCHAR(32) not null',
			'email'=>'VARCHAR(100)',
			'firstname'=>'VARCHAR(100)',
			'lastname'=>'VARCHAR(100)',
			'dt_create'=>'TIMESTAMP	not null',
		));
	}

	public function safeDown() {
		$this->dropTable($this->tablename);
	}

}