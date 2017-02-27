<?php
$dir = dirname( __FILE__ ) . DIRECTORY_SEPARATOR .'docs'. DIRECTORY_SEPARATOR . $_GET['pathToDelete'];
if(file_exists($dir)){
	unlink($dir);
	echo true;exit;
}
echo false;exit;

?>