<?php
include '../connection/connection.php';//connection to database
if (isset($_GET['deleteId'])) {
	// deletes from the table where booked tickets are inserted when the id from the row and the selected row id matches
	$del_ticket=$connection->prepare("DELETE FROM ticket WHERE ticket_id=:deleteId");
if ($del_ticket->execute($_GET)) {
	//directs to the page where booked ticket records are displayed
		header('location:view_booked_ticket.php');
	}
}
?>