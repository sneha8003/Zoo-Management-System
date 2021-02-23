<?php
include '../connection/connection.php';//connection to database
if (isset($_GET['deleteId'])) {
	// deletes from the table where the users are registered when the id from the row and the selected row id matches
	$del_users=$connection->prepare("DELETE FROM register WHERE id=:deleteId");
if ($del_users->execute($_GET)) {
	//directs to page where record of users are displayed
		header('location:view_users.php');

	}
}
?>