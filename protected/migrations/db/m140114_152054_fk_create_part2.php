<?php

/**
 * Миграция m140114_152054_fk_create_part2
 *
 */
class m140114_152054_fk_create_part2 extends QMigrate{

	public function safeUp() {
//                $this->truncateAll();

                $this->alterColumn('article', 'id_category', 'integer(11) not null');
                $this->addForeignKey('fk_article_category', 
                        'article', 'id_category', 
                        'category', 'id');
                
	}

	public function safeDown() {
                $this->dropForeignKey('fk_article_category', 'article');
	}
        
        private function truncateAll() {
                $this->truncateTable('article');
                $this->truncateTable('type_article');
                $this->truncateTable('category');
                $this->truncateTable('menu');
        }
}