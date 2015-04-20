<?php

class QUserHelper {

	static public function printJSFieldCurrentUser() {
		$model = new UserCustom();
		$fields = $model->getField();

		foreach($fields as $key =>$val) {
			echo '<script type="text/javascript"> window.'.$key.' = "'.$val.'"; </script>';
		}
	}

}