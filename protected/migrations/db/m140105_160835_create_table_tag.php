<?php

/**
 * Миграция m140105_160835_create_table_tag
 *
 */
class m140105_160835_create_table_tag extends QMigrate{

	private $tablename = 'tag';

	public function safeUp() {
		$this->createTable($this->tablename, array(
			'id' => 'pk',
			'name' => 'VARCHAR(255) not null',
			'alias' => 'VARCHAR(1000) not null',
			'dt_create' => 'TIMESTAMP not null',
		));
	}

	public function safeDown() {
		$this->dropTable($this->tablename);
	}
}