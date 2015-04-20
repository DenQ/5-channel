<?php echo '<?php' . "\r\n"; ?>
 /**
 * <?php echo $this->className.'Command'; ?> class file
 * @author <?php echo Yii::app()->params->author; ?> <<?php echo Yii::app()->params->email; ?>>
 */

/**
 * <?php echo $this->className.'Command'; ?> is the 
 *
 * @author <?php echo Yii::app()->params->author; ?> <<?php echo Yii::app()->params->email; ?>>
 * @package application.commands
 * 
 * @since 1.0
 */
class <?php echo $this->className.'Command'; ?> extends QConsoleCommand{

        private $tablename = '';

        public function run($args) {
                
        }
}