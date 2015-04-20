<?php

/**
 * initCommand class file
 * @author Denis Ivanov <denquick@gmail.com>
 */

/**
 * initCommand is the 
 *
 * @author Denis Ivanov <denquick@gmail.com>
 * @package application.commands
 * 
 * @since 1.0
 */
class initCommand extends QConsoleCommand {

        /**
         * Classes initialize tables
         * @var type String
         */
        private $NamesClass = array(
                'InitTypeArticle',
                'InitCategory',
                'InitMenu',
        );

        public function run($args) {
                $this->safeDown();

                foreach ($this->NamesClass as $ClassName) {
                        $class = $ClassName . 'Command';
                        $obj = new $class($args, null);
                        $obj->run($args);
                }
        }

        /**
         * Method for safe deinitalize DB
         */
        public function safeDown() {
                $count = count($this->NamesClass);
                for ($i = $count; $i > 0; $i--) {
//                for ($i = 0; $i < $count; $i++) {
                        $ClassName = $this->NamesClass[$i-1];
                        $file = dirname(__FILE__) . DIRECTORY_SEPARATOR . $ClassName . 'Command.php';
                        if (is_file($file)) {
                                require_once $file;
                                $class = $ClassName . 'Command';
                                $obj = new $class();
                                $obj->down();
                        } else {
                                die('Error: file ' . $file . ' not found!');
                        }
                }
        }

}
