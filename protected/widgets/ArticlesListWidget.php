<?php

/**
 * ArticlesListWidget class file
 * @author Denis Ivanov <denquick@gmail.com>
 */

/**
 * ArticlesListWidget is the 
 *
 * @author Denis Ivanov <denquick@gmail.com>
 * @package application.widgets
 * 
 * @since 1.0
 */
class ArticlesListWidget extends CWidget {

//    [TYPE] => news
//    [CATEGORY] => sport
//    [SUB_CATEGORY] => ukr
//    [SORT] => popular
//    [INTERVAL] => day
        private $dataProvider;

        public function init() {
                $model = new ArticleCustom();
                $Criteria = $this->buildCriteria();

                $Data = $model->getData($Criteria);
                $this->dataProvider = new CArrayDataProvider($Data, array(
                        'pagination' => false
                ));
        }

        public function run() {
                $this->render('ArticlesListView', array(
                        'dataProvider' => $this->dataProvider,
                ));
        }

        private function buildCriteria() {
                $Criteria = new CDbCriteria();
                $Criteria->alias = 'a';
                $Criteria->condition = $this->getCondition($Criteria);

                $this->setOffset($Criteria);

                $Criteria->limit = 10;
                $Criteria->order = 'a.id desc';
                return $Criteria;
        }

        private function getCondition(&$Criteria) {
                $Condition = '1 = 1 ';
                if ($_GET['TYPE']) {
                        $Criteria->params[':type'] = $_GET['TYPE'];
                        $Condition .= 'and idType.alias = :type ';
                }
                if ($_GET['CATEGORY']) {
                        $Criteria->params[':category'] = $_GET['CATEGORY'];
                        $Condition .= 'and idCategory.alias = :category ';
                }
                if ($_GET['SUB_CATEGORY']) {
                        $Criteria->params[':sub_category'] = $_GET['SUB_CATEGORY'];
                        $Condition .= 'and sub_category = :sub_category';
                }
                return $Condition;
        }

        private function setOffset(&$Criteria) {
                if (!empty($_GET['PAGE']) && is_numeric($_GET['PAGE']) && $_GET['PAGE'] >= 0) {
                        $Criteria->offset = $_GET['PAGE'] * 10;
                }
        }

}
