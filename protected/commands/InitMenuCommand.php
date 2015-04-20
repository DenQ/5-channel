<?php

/**
 * Initialize table Menu
 * Order part 3
 */
class InitMenuCommand extends QConsoleCommand {

        private $tablename = 'menu';
        private $id_type;

        public function run($args) {
                        $this->down();
                        
                        $Category = $this->selectCategory();
                        $this->id_type = $this->getFirstId('type_article');

                        foreach ($Category as $item) {
                                $item = (object) $item;
                                $this->newRow($item->id, $item->name, $item->alias);
                        }
        }
        
        public function newRow($id_category, $name, $alias) {
                $this->_QMigrate->insert($this->tablename, array(
                        'id_type' => $this->id_type,
                        'id_category' => $id_category,
                        'name' => $name,
                        'alias' => $alias,
                ));
        }

        private function selectCategory() {
                $sql = 'select * from `category` `t `';
                $command = $this->_QMigrate->getDbConnection()->createCommand($sql);
                return $command->queryAll();
        }
        
        public function down() {
                $this->_QMigrate->delete($this->tablename);
        }

}
