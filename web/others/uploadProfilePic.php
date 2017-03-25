<?php

if ( !empty( $_FILES ) ) {

    $tempPath = $_FILES[ 'file' ][ 'tmp_name' ];
    $uploadPath = dirname( __FILE__ ) . DIRECTORY_SEPARATOR .'docs'. DIRECTORY_SEPARATOR . 'profilePics';

	if (!file_exists($uploadPath)) {
		mkdir($uploadPath, 0777, true);
	}
	
	$fullUploadpath = $uploadPath. DIRECTORY_SEPARATOR . $_POST['pathToUpload'].'.png';

    move_uploaded_file( $tempPath, $fullUploadpath );

    $answer = array( 'answer' => 'File transfer completed');
    $json = json_encode( $answer );

    echo $json;

} else {

    echo 'No files';

}

?>