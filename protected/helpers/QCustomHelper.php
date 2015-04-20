<?php
class QCustomHelper{
	
	public static function FormatData($data, $function = 'print_r', $pre = true) {
		echo "<pre>";
		$function( $data );
		echo "</pre>";
	}
        
        public static function IsWindowsOS() {
                if ( preg_match('/win/ium', PHP_OS) ) {
                        return true;
                } return false;                
        }
}