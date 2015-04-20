<?php

/**
 * Миграция m131011_142725_add_indexs_table_user
 *
 */
class m131011_142725_add_indexs_table_user extends QMigrate{
	
	private $tablename = 'user';
	
	public function safeUp() {
		$this->createIndex('uindex_login', $this->tablename, 'login', TRUE);
		$this->createIndex('uindex_code', $this->tablename, 'code', TRUE);
		
		$this->createIndex('index_role_login', $this->tablename, 'role, login');
		$this->createIndex('index_code', $this->tablename, 'code');
		

	}

	public function safeDown() {
		$this->dropIndex('index_role_login', $this->tablename);
		$this->dropIndex('index_code', $this->tablename);
		
		$this->dropIndex('uindex_login', $this->tablename);
		$this->dropIndex('uindex_code', $this->tablename);
	}
}