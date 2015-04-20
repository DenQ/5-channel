<?php

/**
 * Миграция m140111_095040_fk_create_part1
 *
 */
class m140111_095040_fk_create_part1 extends QMigrate{

	public function safeUp() {
                $this->truncateAll();


                $this->alterColumn('article', 'id_type', 'integer(11) not null');
                $this->addForeignKey('fk_article_type', 
                        'article', 'id_type', 
                        'type_article', 'id');
                
	}

	public function safeDown() {
                $this->dropForeignKey('fk_article_type', 'article');
	}
        
        private function truncateAll() {
                $this->truncateTable('article');
                $this->truncateTable('type_article');
                $this->truncateTable('category');
                $this->truncateTable('menu');
        }
}