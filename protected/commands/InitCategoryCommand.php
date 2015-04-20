<?php
/**
 * Initialize table Category
 * Order part 2
 */
class InitCategoryCommand extends QConsoleCommand {

        private $id_type;
        
        private $tablename = 'category';

        public function run($args) {
                        $this->down();
                        
                        $this->id_type = $this->getFirstId('type_article');
                        
                        $this->newRow('Политика', 'politics');
                        $this->newRow('Экономика', 'economics');
                        $this->newRow('Спорт', 'sport');
                        $this->newRow('Культура', 'culture');
                        $this->newRow('Медицина', 'medicine');
                        $this->newRow('Игры', 'games');
        }
        
        public function newRow($name, $alias) {
                $this->_QMigrate->insert($this->tablename, array(
                        'id_type' => $this->id_type,
                        'name' => $name,
                        'alias' => $alias,
                ));
        }

        public function down() {
                $this->_QMigrate->delete($this->tablename);
        }

}
