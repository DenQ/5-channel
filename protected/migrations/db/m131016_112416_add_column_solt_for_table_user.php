<?php

/**
 * Миграция m131016_112416_add_column_solt_for_table_user
 *
 */
class m131016_112416_add_column_solt_for_table_user extends QMigrate{
	
	private $tablename = 'user';
	
	public function safeUp() {
		$this->addColumn($this->tablename, 'salt', 'varchar(64) after `password`');
	}

	public function safeDown() {
		$this->dropColumn($this->tablename, 'salt');
	}
}