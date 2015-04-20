<?php

class QDBHelper {

        /**
         * @property CActiveRecord $model
         * @param String $ModelName
         * @param String $fieldName
         * @param String $value
         * @return Integer
         */
        public static function getCount($ModelName, $fieldName = null, $value = null) {
                $model = new $ModelName();
                $Criteria = array();
                if (!empty($fieldName) && !empty($value))
                        $Criteria = array(
                                'condition' => $fieldName . '=:key',
                                'params' => array(
                                        ':key' => $value
                                ),
                        );
                $count = $model->count($Criteria);
                return (int) $count;
        }

        /**
         * 
         * @param String $ModelName
         * @param String $condition
         * @param Array $params
         * @return StdObject
         */
        public static function findAll($ModelName, $condition = '', $params = array()) {
                $model = new $ModelName();
                return $model->findAll($condition, $params);
        }

}
