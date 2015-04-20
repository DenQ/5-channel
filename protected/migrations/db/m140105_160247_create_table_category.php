<?php

/**
 * Миграция m140105_160247_create_table_category
 *
 */
class m140105_160247_create_table_category extends QMigrate{

	private $tablename = 'category';

	public function safeUp() {
		$this->createTable($this->tablename, array(
			'id' => 'pk',
			'id_type' => 'integer(5) not null default 1',
			'id_root' => 'integer(5) not null default 0',
			'name' => 'VARCHAR(255) not null',
			'description' => 'VARCHAR(1000)',
			'alias' => 'VARCHAR(1000) not null',
		));
	}

	public function safeDown() {
		$this->dropTable($this->tablename);
	}
}