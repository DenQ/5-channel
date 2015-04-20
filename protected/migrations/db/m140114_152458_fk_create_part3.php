<?php

/**
 * Миграция m140114_152458_fk_create_part3
 *
 */
class m140114_152458_fk_create_part3 extends QMigrate{

	public function safeUp() {
                $this->alterColumn('article', 'id_user', 'integer(11) not null');
                $this->addForeignKey('fk_article_user', 
                        'article', 'id_user', 
                        'user', 'id');
                
	}

	public function safeDown() {
                $this->dropForeignKey('fk_article_user', 'article');
	}
}