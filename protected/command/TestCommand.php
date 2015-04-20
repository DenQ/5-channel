<?php
 /**
 * TestCommand class file
 * @author Denis Ivanov <denquick@gmail.com>
 */

/**
 * TestCommand is the 
 *
 * @author Denis Ivanov <denquick@gmail.com>
 * @package application.widgets
 * 
 * @since 1.0
 */
class TestCommand extends CWidget {

	public function init() {
		
	}

	public function run() {
		$this->render('TestView');
	}
}