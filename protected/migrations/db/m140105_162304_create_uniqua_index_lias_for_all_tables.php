<?php

/**
 * Миграция m140105_162304_create_uniqua_index_lias_for_all_tables
 *
 */
class m140105_162304_create_uniqua_index_lias_for_all_tables extends QMigrate {

	private $tablename = '';

	public function safeUp() {
		$this->change('article');
		$this->change('type_article');
		$this->change('category');
		$this->change('tag');
		$this->change('menu');
	}

	public function safeDown() {
		$this->dropIndex('ui_article_alias', 'article');
		$this->dropIndex('ui_type_article_alias', 'type_article');
		$this->dropIndex('ui_category_alias', 'category');
		$this->dropIndex('ui_tag_alias', 'tag');
		$this->dropIndex('ui_menu_alias', 'menu');
	}

	private function change($tablename, $columnname = 'alias') {
		$this->alterColumn($tablename, $columnname, 'varchar(255) not null');
		$this->createIndex('ui_' . $tablename . '_' . $columnname, $tablename, $columnname, true);
	}

}