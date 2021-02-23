<?php
include '../connection/connection.php';//connection to database
if (isset($_GET['deleteId'])) {
	// deletes from the table where zookeepers are registered when the id from the row and the selected row id matches
	$del_zookeeper=$connection->prepare("DELETE FROM register WHERE id=:deleteId");
if ($del_zookeeper->execute($_GET)) {
	//directs to the page where records of zookeepers are displayed 
	header('location:view_zookeeper.php');

	}
}
?>