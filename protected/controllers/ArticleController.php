<?php

class ArticleController extends Controller {

        public function actionList() {
                $this->render('list');
        }

        public function actionShow($alias) {
                $this->render('show');
        }

}

?>
