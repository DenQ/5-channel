<?php

/**
 * Миграция m140105_160552_create_table_menu
 *
 */
class m140105_160552_create_table_menu extends QMigrate{

	private $tablename = 'menu';

	public function safeUp() {
		$this->createTable($this->tablename, array(
			'id' => 'pk',
			'id_type' => 'integer(5) not null default 1',
			'id_root' => 'integer(5) not null default 0',
			'id_category' => 'integer(11) not null',
			'name' => 'VARCHAR(255) not null',
			'description' => 'VARCHAR(1000)',
			'alias' => 'VARCHAR(1000) not null',
			'position' => 'integer(3) not null default 0',
		));
	}

	public function safeDown() {
		$this->dropTable($this->tablename);
	}
}