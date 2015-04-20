<?php

class CommandCode extends CCodeModel {

	public $className;

	public function rules() {
		return array_merge(parent::rules(), array(
			array('className', 'required'),
			array('className', 'match', 'pattern' => '/^\w+$/'),
		));
	}

	public function attributeLabels() {
		return array_merge(parent::attributeLabels(), array(
			'className' => 'Command Class Name',
		));
	}

	public function prepare() {
		$path = Yii::getPathOfAlias('application.commands.' . $this->className) . 'Command.php';
		$code = $this->render($this->templatepath . '/command.php');
		$this->files[] = new CCodeFile($path, $code);
	}

}

?>
