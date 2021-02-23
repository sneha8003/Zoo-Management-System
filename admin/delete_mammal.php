<?php
include '../connection/connection.php';//connection to database
if (isset($_GET['deleteId'])) {
	// deletes from the table where mammal are recorded when the id from the row and the selected row id matches
	$del_mammal=$connection->prepare("DELETE FROM mammal WHERE id=:deleteId");
if ($del_mammal->execute($_GET)) {
	//directs to the page where mammals are displayed
	header('location:view_mammal.php');

	}
}
?>