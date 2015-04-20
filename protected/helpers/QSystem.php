<?php

class QSystem {

        public static function getNameDB() {
                if (preg_match('/dbname=(.*);/ium', Yii::app()->db->connectionString, $mas)) {
                        return trim($mas[1]);
                } return;
        }

        public static function getBaseUrl() {
                return Yii::app()->getBaseUrl(1);
        }

}
