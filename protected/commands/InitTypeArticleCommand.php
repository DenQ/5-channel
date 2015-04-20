<?php

/**
 * Initialize table `type_article`
 * Order part 1
 */
class InitTypeArticleCommand extends QConsoleCommand {

        private $tablename = 'type_article';

        public function run($args) {
                $this->down();

                $this->newRow('Новости', 'Новостной раздел', 'news');
                $this->newRow('Блоги', 'Блог раздел', 'blogs');
        }

        public function newRow($name, $description, $alias) {
                $this->_QMigrate->insert($this->tablename, array(
                        'name' => $name,
                        'description' => $description,
                        'alias' => $alias,
                ));
        }
        
        public function down() {
                $this->_QMigrate->delete($this->tablename);
        }

}
