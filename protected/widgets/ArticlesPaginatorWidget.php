<?php
 /**
 * ArticlesPaginatorWidget class file
 * @author Denis Ivanov <denquick@gmail.com>
 */

/**
 * ArticlesPaginatorWidget is the 
 *
 * @author Denis Ivanov <denquick@gmail.com>
 * @package application.widgets
 * 
 * @since 1.0
 */
class ArticlesPaginatorWidget extends CWidget {
        
        private $UrlPath;
        private $Count;
        private $SummaryPages;
        
        private $StartPage = 0;
        private $EndPage = 7;
        
        const LIMIT_PAGE = 10;
        
        

	public function init() {
		$this->UrlPath = QSystem::getBaseUrl() . '/';
                $this->concateParam('TYPE');
                $this->concateParam('CATEGORY');
                $this->concateParam('SUB_CATEGORY');
                
                $this->initCount();

                $this->initParams();
                
	}

	public function run() {
                $this->render('ArticlesPaginatorView', array(
                        'UrlPath' => $this->UrlPath,
                        'CountPage' => $this->SummaryPages,
                        'StartPage' => $this->StartPage,
                        'EndPage' => $this->EndPage,
                        'CurrentPage' => $_GET['PAGE'],
                ));
	}
        
        private function initParams() {
                if ( !key_exists('PAGE', $_GET)) {
                        $_GET['PAGE'] = 0;
                }
                if ( $_GET['PAGE'] != null ) {
                        if ( $_GET['PAGE'] > 5 ) {
                                $this->StartPage = $_GET['PAGE'] - 3;
                        } else {
                                $this->StartPage = 0;
                        }
                }
                
                $this->EndPage = self::LIMIT_PAGE + $this->StartPage;
                if ($this->EndPage >= $_GET['PAGE']-3) {
                        $this->EndPage = $this->StartPage + self::LIMIT_PAGE;
                }
        }
        
        private function concateParam($key) {
                if ($_GET[$key]!=null)
                        $this->UrlPath .= $_GET[$key] . '/';                
        }
        
        
        
        public function initCount() {
                $model = new ArticleCustom();
                $Criteria = $this->buildCriteria();
                $this->Count = $model->getCount($Criteria);
                $this->SummaryPages = ceil($this->Count/self::LIMIT_PAGE);
        }

        private function buildCriteria() {
                $Criteria = new CDbCriteria();
                $Criteria->alias = 'a';
                $Criteria->condition = $this->getCondition($Criteria);
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
}