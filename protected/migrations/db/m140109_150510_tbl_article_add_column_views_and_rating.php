<?php

/**
 * Миграция m140109_150510_tbl_article_add_column_views_and_rating
 *
 */
class m140109_150510_tbl_article_add_column_views_and_rating extends QMigrate{

	private $tablename = 'article';

	public function safeUp() {
                $this->addColumn($this->tablename, 'views', 'integer(11) unsigned not null default 0');
                $this->addColumn($this->tablename, 'rating', 'integer(11) not null default 0');
	}

	public function safeDown() {
                $this->dropColumn($this->tablename, 'views');
                $this->dropColumn($this->tablename, 'rating');
	}
}