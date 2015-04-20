<?php

class QAliasHelper {

        private static $converter = array(
                'а' => 'a', 'б' => 'b', 'в' => 'v',
                'г' => 'g', 'д' => 'd', 'е' => 'e',
                'ё' => 'e', 'ж' => 'zh', 'з' => 'z',
                'и' => 'i', 'й' => 'y', 'к' => 'k',
                'л' => 'l', 'м' => 'm', 'н' => 'n',
                'о' => 'o', 'п' => 'p', 'р' => 'r',
                'с' => 's', 'т' => 't', 'у' => 'u',
                'ф' => 'f', 'х' => 'h', 'ц' => 'c',
                'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sch',
                'ь' => '\'', 'ы' => 'y', 'ъ' => '\'',
                'э' => 'e', 'ю' => 'yu', 'я' => 'ya',
                'А' => 'A', 'Б' => 'B', 'В' => 'V',
                'Г' => 'G', 'Д' => 'D', 'Е' => 'E',
                'Ё' => 'E', 'Ж' => 'Zh', 'З' => 'Z',
                'И' => 'I', 'Й' => 'Y', 'К' => 'K',
                'Л' => 'L', 'М' => 'M', 'Н' => 'N',
                'О' => 'O', 'П' => 'P', 'Р' => 'R',
                'С' => 'S', 'Т' => 'T', 'У' => 'U',
                'Ф' => 'F', 'Х' => 'H', 'Ц' => 'C',
                'Ч' => 'Ch', 'Ш' => 'Sh', 'Щ' => 'Sch',
                'Ь' => '\'', 'Ы' => 'Y', 'Ъ' => '\'',
                'Э' => 'E', 'Ю' => 'Yu', 'Я' => 'Ya',
        );

        /**
         * 
         * @param string $name
         * @param string $ModelName
         * @return bool
         */
        public static function Create($name, $ModelName) {
                $name = self::str2url($name);
                if (self::isAlias($name, $ModelName))
                        $name = $name . '-' . date('Ymdhis', time());
                return self::str2url($name);
        }
        
        /**
         * 
         * @param String $text
         * @return String
         */
        public static function Translate($text) {
                return self::str2url($text);
        }

        /**
         * 
         * @param type $name
         * @param type $ModelName
         * @return bool
         */
        private static function getCount($name, $ModelName) {
                $model = new $ModelName();
                $count = $model->count(array(
                        'condition' => 'alias=:alias',
                        'params' => array(
                                ':alias' => $name
                        ),
                ));
                return (int) $count;
        }

        private static function isAlias($name, $ModelName) {
                return (bool) self::getCount($name, $ModelName);
        }

        private static function rus2translit($text) {
                return strtr($text, self::$converter);
        }

        private static function str2url($text) {
                $text = self::rus2translit($text);
                $text = preg_replace(array(
                        '~[^-a-z0-9_]+~u',
                        '/[-]+/ium',
                        ), '-', strtolower($text));
                return trim($text, "-");
        }

}
