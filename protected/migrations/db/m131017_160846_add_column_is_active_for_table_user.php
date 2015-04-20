<?php

/**
 * Миграция m131017_160846_add_column_is_active_for_table_user
 *
 */
class m131017_160846_add_column_is_active_for_table_user extends QMigrate{
	
	private $tablename = 'user';
	
	public function safeUp() {
		$this->addColumn($this->tablename, 'is_active', 'boolean not null default false');
	}

	public function safeDown() {
		$this->dropColumn($this->tablename, 'is_active');
	}
}