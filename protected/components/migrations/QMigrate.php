<?php
/**
 * Class extended base class migration
 */
class QMigrate extends CDbMigration {

        /**
         * Get number rows for selected table name
         * @param type $tablename
         * @return type integer
         */
        public function getCountTable($tablename) {
                $db = $this->getDbConnection();
                $sql = 'select count(*) as `cnt` from `' . $tablename . '` limit 1';
                $command = $db->createCommand($sql);
                $result = (object)$command->queryRow();
                return (int)$result->cnt;
        }
        
        public function getLastInsertId() {
                $db = $this->getDbConnection();
                $sql = 'select last_insert_id() as `id` limit 1';
                $command = $db->createCommand($sql);
                $result = (object)$command->queryRow();
                return (int)$result->id;                
        }

}
