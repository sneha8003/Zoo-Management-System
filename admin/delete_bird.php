<?php
include '../connection/connection.php';//connection to database
if (isset($_GET['deleteId'])) {
	// deletes from the table where bird are recorded when the id from the row and the selected row id matches
	$del_bird=$connection->prepare("DELETE FROM bird WHERE id=:deleteId");
if ($del_bird->execute($_GET)) {
	//directs to the page where birds are displayed
		header('location:view_bird.php');
	}
}
?>