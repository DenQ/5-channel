<?php

/**
 * Миграция m131011_142121_add_column_code_table_user
 *
 */
class m131011_142121_add_column_code_table_user extends CDbMigration{
	
	private $tablename = 'user';
	
	public function safeUp() {
		$this->addColumn($this->tablename, 'code', 'varchar(64)');
	}

	public function safeDown() {
		$this->dropColumn($this->tablename, 'code');
	}
}