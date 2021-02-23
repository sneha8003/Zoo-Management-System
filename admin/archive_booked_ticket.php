<?php
ob_start();
include '../connection/connection.php';//connection to database

if (isset($_GET['archiveId'])) {
	// updates the archive_ticket column from ticket table of database 
    $archive_ticket = $connection->prepare("UPDATE ticket SET archive_ticket=:archive_ticket WHERE ticket_id=:archiveId");

    $ticket=[
    	// id has been get 
    	'archiveId'=>$_GET['archiveId'],
    	// inserts true value to archive ticket column
        'archive_ticket'=>'true'
    ];
	if($archive_ticket->execute($ticket)){
	// directs to the page where booked tickets are displayed
	header('location:view_booked_ticket.php');
}
}
ob_flush();
?>
