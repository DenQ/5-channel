<?php

/**
 * Миграция m140105_161032_create_table_link_article_tag
 *
 */
class m140105_161032_create_table_link_article_tag extends QMigrate{

	private $tablename = 'link_article_tag';

	public function safeUp() {
		$this->createTable($this->tablename, array(
			'id_article' => 'integer(11) not null',
			'id_tag' => 'integer(11) not null',
		));
	}

	public function safeDown() {
		$this->dropTable($this->tablename);
	}
}