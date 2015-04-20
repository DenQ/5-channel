<?php

class ArticleCustom extends Article {

        public function getData($Criteria) {
                return $this->with('idCategory', 'idType')->cache(10)->findAll( $Criteria );
        }
        public function getCount($Criteria) {
                return $this->with('idCategory', 'idType')->cache(10)->count( $Criteria );
        }

}
