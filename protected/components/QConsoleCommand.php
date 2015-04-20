<?php

/**
 * Class for Console Commands.
 * Wrapper class CConsoleCommand.
 * 
 * @property QMigrate $_QMigrate The object QMigrate class.
 * 
 */
class QConsoleCommand extends CConsoleCommand {

        /**
         * Object class QMigrate
         * @var type QMigrate
         */
        public $_QMigrate;

        public function __construct($name, $runner) {
                parent::__construct($name, $runner);
                $this->_QMigrate = new QMigrate();
        }

        public function parseArgs($T, $args) {
                if (!empty($args)) {
                        foreach ($args as $nameMethod) {
                                if (method_exists($T, $nameMethod))
                                        $T->$nameMethod();
                                else
                                        echo "Not found method $nameMethod \r\n";
                        }
                        exit;
                }
        }

        /**
         * 
         * @param type $table string
         * @return type int
         */
        public function getFirstId($table) {
                $sql = 'select * from ' . $table . ' limit 1';
                $command = $this->_QMigrate->getDbConnection()->createCommand($sql);
                $result = $command->queryAll();
                $result = (object) $result[0];
                return (int) $result->id;
        }

        /**
         * 
         * @param String $table
         * @param Array $data
         */
        public function newRow($table, $data) {
                $this->_QMigrate->insert($table, $data);
                return $this->_QMigrate->getLastInsertId();
        }

        /**
         * 
         * @param String $table
         */
        public function delete($table) {
                $this->_QMigrate->delete($table);
        }

}
