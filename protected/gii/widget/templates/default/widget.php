<?php echo '<?php' . "\r\n"; ?>
 /**
 * <?php echo $this->className.'Widget'; ?> class file
 * @author <?php echo Yii::app()->params->author; ?> <<?php echo Yii::app()->params->email; ?>>
 */

/**
 * <?php echo $this->className.'Widget'; ?> is the 
 *
 * @author <?php echo Yii::app()->params->author; ?> <<?php echo Yii::app()->params->email; ?>>
 * @package application.widgets
 * 
 * @since 1.0
 */
class <?php echo $this->className.'Widget'; ?> extends CWidget {

	public function init() {
		
	}

	public function run() {
		$this->render('<?php echo $this->className.'View';?>');
	}
}