<?php

abstract class APIController extends CController implements IAPIController{

	protected $data;
	protected $model;

	public function actionIndex() {
		var_dump($_SERVER);
		if ( !empty($_SERVER['REQUEST_METHOD']) ) {
			$method = strtolower($_SERVER['REQUEST_METHOD']);
			if ( method_exists($this, $method) ) {
				$this->$method();
			}
		}
		
	}
	
	public function actionSendMethod($name) {
		/**
		  <Directory "%ssitedir%/*">
		  AllowOverride All
		  Options -MultiViews +Indexes +FollowSymLinks +IncludesNoExec +Includes +ExecCGI
		  <LimitExcept GET POST HEAD PUT DELETE>
		  Order deny,allow
		  Deny from all
		  </LimitExcept>
		  </Directory>
		 */
		$url = 'http://shop.dev/api/my/';
		$tuCurl = curl_init();
		curl_setopt($tuCurl, CURLOPT_URL, $url);
		curl_setopt($tuCurl, CURLOPT_CUSTOMREQUEST, $name);
		curl_setopt($tuCurl, CURLOPT_PUT, 1);
		curl_setopt($tuCurl, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($tuCurl, CURLOPT_HEADER, 0);
		curl_setopt($tuCurl, CURLOPT_RETURNTRANSFER, 1);
		
		$tuData = curl_exec($tuCurl);
		
		curl_close($tuCurl);
		echo $tuData;
	}
	
	public function __destruct() {
		$this->render('/response/index', array(
			'data'=>$this->data
		));
	}

}