<?php

class MigrationCommand extends CConsoleCommand {
        
        /**
         * Recreate db
         */
	public function actionClear() {
		$dbname = QSystem::getNameDB();
		
		$connection = Yii::app()->db;
		$sql = 'drop database `'.$dbname.'`';
		$command = $connection->createCommand($sql);
		$command->execute();
		echo "database clear...\r\n";
		
		$sql = 'create database `'.$dbname.'` default character set utf8';
		$command = $connection->createCommand($sql);
		$command->execute();
		echo "database create...\r\n";
		
		$sql = 'use `'.$dbname.'`';
		$command = $connection->createCommand($sql);
		$command->execute();
		echo "database used...\r\n";
	}
	
	public function actionHelp() {
		echo "<HELP  Migration:>\r\n";
		echo "Run example: \t\"php.exe protected/yiic.php migration clear\"\nWarning delete all database!\r\n";
	}
	
}