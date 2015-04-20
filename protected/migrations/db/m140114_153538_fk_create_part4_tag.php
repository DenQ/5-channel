<?php

/**
 * Миграция m140114_153538_fk_create_part4_tag
 *
 */
class m140114_153538_fk_create_part4_tag extends QMigrate{

	public function safeUp() {
                
                $this->createIndex('ui_article_tag', 'link_article_tag', 'id_article, id_tag',  true);
                
                $this->addForeignKey('fk_link_tag_article_article', 
                        'link_article_tag', 'id_article', 
                        'article', 'id');
                
                $this->addForeignKey('fk_link_tag_article_tag', 
                        'link_article_tag', 'id_tag', 
                        'tag', 'id');
                
	}

	public function safeDown() {
                $this->dropForeignKey('fk_link_tag_article_article', 'link_article_tag');
                $this->dropForeignKey('fk_link_tag_article_tag', 'link_article_tag');
	}
}