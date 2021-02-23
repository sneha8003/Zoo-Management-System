<?php
include '../connection/connection.php';//connection to database
if (isset($_GET['deleteId'])) {
	// deletes from the table where sponsors are registered when the id from the row and the selected row id matches
	$del_sponsor=$connection->prepare("DELETE FROM sponsor WHERE sponsor_id=:deleteId");
if ($del_sponsor->execute($_GET)) {
	//directs to the page where sponsors are displayed
		header('location:view_sponsors.php');
	}
}
?>