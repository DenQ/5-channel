<?php

/**
 * GenerateArticlesCommand class file
 * @author Denis Ivanov <denquick@gmail.com>
 */

/**
 * GenerateArticlesCommand is the class for generation new Articles
 *
 * @author Denis Ivanov <denquick@gmail.com>
 * @package application.commands
 * 
 * @since 1.0
 */
class GenerateArticlesCommand extends QConsoleCommand {

        private $tablename = 'article';
        private $countCategory;
        private $category;
        private $idType;
        private $SubCategory = array('ukraine', 'russia', 'world',);

        const LIMIT = 10000;

        public function run($args) {
                $this->parseArgs($this, $args);

                
                $this->initCategory();
//                echo $this->getRandCategory();
//                exit;
                $this->idType = $this->getFirstId('type_article');
                
                $this->down();
                $this->up();
        }

        public function up() {
                for ($i = 0; $i < self::LIMIT; $i++)
                        $this->newArticle($i);
        }

        public function down() {
                $this->_QMigrate->delete($this->tablename);
        }

        private function initCategory() {
                $this->category = QDBHelper::findAll('Category');
                $this->countCategory = $this->_QMigrate->getCountTable('category');
        }
        private function getRandCategory() {
                $index = rand(0, $this->countCategory-1);
                return $this->category[$index]->id;
        }

        private function newArticle($i) {
                $this->_QMigrate->insert($this->tablename, array(
                        'id_user' => 1,
                        'id_type' => $this->idType,
                        'id_category' => $this->getRandCategory(),
                        'sub_category' => $this->SubCategory[rand(0, 2)],
                        'name' => 'Test - ' . $i,
                        'description' => $this->getText($i),
                        'anons' => $this->getText($i, 300),
                        'alias' => QAliasHelper::Create("Тест - $i", 'Article'),
                        'logo' => 'logo.jpg',
                        'dt_create' => date('Y-m-d h:i:s', time()),
                        'custom' => 'generated',
                ));
        }

        private function getText($number, $limit = 1000) {
                $str = '';
                for ($i = 0; $i < $limit; $i++) {
                        $str .= ' text' . $number;
                } return $str;
        }

}
