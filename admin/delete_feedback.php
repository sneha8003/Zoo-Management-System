<?php
include '../connection/connection.php';//connection to database
if (isset($_GET['deleteId'])) {
	// deletes from the table where feedbacks are recorded when the id from the row and the selected row id matches
	$del_feedback=$connection->prepare("DELETE FROM feedback WHERE feedback_id=:deleteId");
if ($del_feedback->execute($_GET)) {
	//directs to the page where the feedbacks are displayed
		header('location:view_feedback.php');

	}
}
?>