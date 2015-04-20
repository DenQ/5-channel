<?php

/**
 * Миграция m140114_152827_fk_create_part4_menu
 *
 */
class m140114_152827_fk_create_part4_menu extends QMigrate{

	public function safeUp() {
                $this->alterColumn('menu', 'id_category', 'integer(11)  not null');
                $this->addForeignKey('fk_menu_category', 
                        'menu', 'id_category', 
                        'category', 'id');
                
	}

	public function safeDown() {
                $this->dropForeignKey('fk_menu_category', 'menu');
	}
}