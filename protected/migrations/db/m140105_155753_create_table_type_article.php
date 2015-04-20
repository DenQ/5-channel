<?php

/**
 * Миграция m140105_155753_create_table_type_article
 * 
 */
class m140105_155753_create_table_type_article extends QMigrate {

	private $tablename = 'type_article';

	public function safeUp() {
		$this->createTable($this->tablename, array(
			'id' => 'pk',
			'name' => 'VARCHAR(255) not null',
			'description' => 'VARCHAR(1000)',
			'alias' => 'VARCHAR(1000) not null',
		));
	}

	public function safeDown() {
		$this->dropTable($this->tablename);
	}

}