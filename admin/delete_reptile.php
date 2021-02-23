<?php
include '../connection/connection.php';//connection to database
if (isset($_GET['deleteId'])) {
	// deletes from the table where reptile are recorded when the id from the row and the selected row id matches
	$del_reptile=$connection->prepare("DELETE FROM reptile WHERE id=:deleteId");
	//directs to the page where reptile are displayed
if ($del_reptile->execute($_GET)) {
		header('location:view_reptile.php');

	}
}
?>