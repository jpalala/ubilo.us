<?php
$db_username = '';
$db_password = '';
$db_host = '';
$db_name = ''; 
class Url {
	public static $url = 'http://ubilo.us/';

	//returns base url. obviously
	function getBaseUrl() {
		return self::$url;
	}
	/**
	*@functionName getCss
	*@param string $css (no need to add .css)
	*@returns string path/to/js/file
	*/
	function getCss($css) {
		return $self::$url . 'styles/'.$css . '.css';
	}	
	/**
	*@functionName getJs
	*@param string $js (no need to add .js)
	*@returns string path/to/js/flie 
	*/
	function getJs($js) {

		return $self::$url . 'scripts/'.$js . '.js';
	}
}
?>
