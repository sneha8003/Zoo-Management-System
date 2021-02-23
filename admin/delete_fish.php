<?php
include '../connection/connection.php';//connection to database
if (isset($_GET['deleteId'])) {
	// deletes from the table where fish are recorded when the id from the row and the selected row id matches
	$del_fish=$connection->prepare("DELETE FROM fish WHERE id=:deleteId");
if ($del_fish->execute($_GET)) {
		//directs to the page where fish are displayed
		header('location:view_fish.php');

	}
}
?>