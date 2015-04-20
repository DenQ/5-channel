<?php

/**
 * TopMenuWidget class file
 * @author Denis Ivanov <denquick@gmail.com>
 */

/**
 * TopMenuWidget is the 
 *
 * @author Denis Ivanov <denquick@gmail.com>
 * @package application.widgets
 * 
 * @since 1.0
 */
class TopMenuWidget extends CWidget {

        private $Menu;
        private $Items;

        public function init() {
                $this->Menu = $this->getMenuRows();
                $this->Items = $this->getItems();
        }

        public function run() {
                $this->render('TopMenuView', array(
                        'Items' => $this->Items,
                ));
        }

        /**
         * @return type array
         */
        private function getMenuRows() {
                $model = Menu::model();
                return $model->with('idCategory', 'idTypeArticle')->findAll();
        }

        /**
         * @return type array
         */
        private function getItems() {
                $el = array();
                foreach ($this->Menu as $item) {
                        $el[] = array(
                                'label' => $item->name,
                                'url' => array('/' . $item->idTypeArticle->alias . '/' . $item->alias),
                                'active' => (( $_GET['CATEGORY'] == $item->idCategory->alias ) ? true : false)
                        );
                } return $el;
        }

}