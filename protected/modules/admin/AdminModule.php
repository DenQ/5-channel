<?php

class AdminModule extends CWebModule {

	public function init() {
		Yii::app()->setViewPath('protected/modules/admin/views/');
		$this->setImport(array(
			'admin.models.*',
			'admin.models.ar.*',
			'admin.components.*',
		));
	}

	public function beforeControllerAction($controller, $action) {
		if ( parent::beforeControllerAction($controller, $action) && (Yii::app()->user->name !== 'Guest') )  {
			return true;
		} else {
			$controller->redirect('/');
			return false;
		}
	}
	
}
