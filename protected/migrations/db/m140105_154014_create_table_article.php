<?php

/**
 * Миграция m140105_154014_create_table_article
 */
class m140105_154014_create_table_article extends QMigrate {

	private $tablename = 'article';

	public function safeUp() {
		$this->createTable($this->tablename, array(
			'id' => 'pk',
			'id_user' => 'integer(11) unsigned not null',
			'id_type' => 'integer(5) unsigned not null default 1',
			'id_category' => 'integer(11) unsigned not null',
			'sub_category' => 'enum("ukraine", "russia", "world") not null default "world"',
			'name' => 'VARCHAR(255) not null',
			'description' => 'text not null',
			'anons' => 'varchar(1000) not null',
			'alias' => 'varchar(1000) not null',
			'logo' => 'varchar(100) not null',
			'dt_create' => 'TIMESTAMP not null',
			'dt_edite' => 'TIMESTAMP',
			'dt_start' => 'TIMESTAMP',
			'dt_end' => 'TIMESTAMP',
			'seo_keywords' => 'VARCHAR(1000)',
			'seo_description' => 'VARCHAR(5000)',
		));
	}

	public function safeDown() {
		$this->dropTable($this->tablename);
	}

}