<?php

/**
 * Миграция m140110_163318_tbl_article_add_column_custom
 *
 */
class m140110_163318_tbl_article_add_column_custom extends QMigrate{

	private $tablename = 'article';

	public function safeUp() {
                $this->addColumn($this->tablename, 'custom', 'text');
	}

	public function safeDown() {
                $this->dropColumn($this->tablename, 'custom');
	}
}