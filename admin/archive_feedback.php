<?php
ob_start();
include '../connection/connection.php';//connection to database

if (isset($_GET['archiveId'])) {
	// updates the archive_feedback column from feedback table of database 
    $archive_feedback = $connection->prepare("UPDATE feedback SET archive_feedback=:archive_feedback WHERE feedback_id=:archiveId");

    $feedback=[
    	// id has been get 
    	'archiveId'=>$_GET['archiveId'],
    	// inserts true value to archive feedback column
        'archive_feedback'=>'true'
    ];
	if($archive_feedback->execute($feedback)){
	// directs to the page where feedbacks are displayed
	header('location:view_feedback.php');
}
}
ob_flush();
?>
