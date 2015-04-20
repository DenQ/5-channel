<?php

class SiteController extends Controller {

        /**
         * Declares class-based actions.
         */
        public function actions() {
                return array(
                        'captcha' => array(
                                'class' => 'CCaptchaAction',
                                'backColor' => 0xFFFFFF,
                        ),
                );
        }

        public function actionIndex() {
                $this->render('index');
        }

        public function actionTest() {
                $this->render('index');
        }

        public function actionArticle() {
                $this->render('list');
        }

        public function actionError() {
                if ($error = Yii::app()->errorHandler->error) {
                        if (Yii::app()->request->isAjaxRequest)
                                echo $error['message'];
                        else
                                $this->render('error', $error);
                }
        }

        public function actionLogin() {
                $model = new LoginForm;

                if (isset($_POST['LoginForm'])) {
                        $model->attributes = $_POST['LoginForm'];

                        if ($model->validate() && $model->login()) {
                                $this->redirect(Yii::app()->user->returnUrl);
                        }
                }
                $this->render('login', array('model' => $model));
        }

        public function actionRegistration() {
                $model = new RegistrationForm();
                if (isset($_POST['RegistrationForm'])) {
                        $model->attributes = $_POST['RegistrationForm'];
                        if ($model->validate()) {
                                $captcha = Yii::app()->getController()->createAction('captcha');
                                if ($captcha->verifyCode == $model->verifyCode) {
                                        if ($model->registration($model->attributes)) {
                                                $this->redirect('/');
                                        }
//					$this->render('registration', array('model' => $model));
                                }
                        }
                }
                $this->render('registration', array('model' => $model));
        }

        public function actionLogout() {
                Yii::app()->user->logout();
                $this->redirect(Yii::app()->homeUrl);
        }

}
