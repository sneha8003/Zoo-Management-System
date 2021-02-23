<?php
include '../connection/connection.php';//connection to the database
include 'admin_header.php';// includes header 
include 'admin_sidebar.php';// includes sidebar

//selects the records from the ticket table of the database whose value of archive ticket is false
$booked_ticket=$connection->prepare("SELECT * FROM ticket WHERE archive_ticket='false'");
//the records are executed
$booked_ticket ->execute();
?>
<aside class="right-side">   
    <section class="content-header">
        <h1>Booked Ticket</h1>
            <!-- displays the path in which page the admin lands-->
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Booked Ticket</a></li>
            </ol>
    </section>
         
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <!-- table for displaying the records -->
                    <div class="box-body table-responsive">
                        <table id="example1" class="table table-bordered table-striped" style="width: 100%;">
                                 <thead>
                                    <tr>
                                        <!-- headings of the column -->
                                        <th>SN</th> 
                                        <th>Date</th>
                                        <th>Username</th>  
                                        <th>Child under 3</th>
                                        <th>Child Quantity</th>
                                        <th>Adult Quantity</th>  
                                        <th>Action</th>     
                                    </tr>
                                </thead>

                                <?php
                                $sn=1;
                                foreach ($booked_ticket as $row) {
                                ?>
                                <tr>
                                    <td><?php echo $sn++;?></td>
                                    <!-- displays the record of the booked quantity with the username-->
                                    <td><?php echo $row['ticket_date'];?></td>
                                     <td><?php echo $row['username'];?></td>
                                    <td><?php echo $row['child_under'];?></td>
                                    <td><?php echo $row['child_quantity'];?></td>
                                    <td><?php echo $row['adult_quantity'];?></td>
                                    <td>

                                    <!-- archive button which retrieves the id of the particular booked ticket and leads to the confirmation modal-->
                                    <a href="#archive<?= $row['ticket_id'];?>" class="btn btn-success" data-toggle="modal"><i class="fa fa-minus-circle"></i> Archive</a> 

                                    <!-- delete button which retrieves the id of the particular user-->
                                    <a href="#delete<?= $row['ticket_id'];?>" class="btn btn-danger" data-toggle="modal"><i class="fa fa-trash-o"></i> Delete</a> 
                                    </td>
                                </tr>

                        <!-- confirmation modal to archive booked tickets -->
                        <div class="modal fade" id="archive<?= $row['ticket_id'];?>" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <!-- cross icon dismiss the confirmation modal of deletion of feedback-->
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure want to archive the booked ticket?
                                    </div>
                                    <div class="modal-footer">
                                        <div class="col-xs-1">
                                            <!-- cancel button dismiss the modal -->
                                            <a class="btn btn-default" data-dismiss="modal">Cancel</a>
                                        </div>
                                        <div class="col-xs-11">
                                            <!-- archive button retrieves the id and directs to the archive page of the booked tickets-->
                                            <a href="archive_booked_ticket.php?archiveId=<?= $row['ticket_id'];?>" class="btn btn-success">Archive</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- confirmation modal for the deletion of the booked tickets -->
                        <div class="modal fade" id="delete<?= $row['ticket_id'];?>" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <!-- cross icon dismiss the modal and directs to the page where records are displayed-->
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure want to the record?
                                        </div>
                                        <div class="modal-footer">
                                            <div class="col-xs-1">
                                                <!-- cancel button dismiss the modal -->
                                                <a class="btn btn-default" data-dismiss="modal">Cancel</a>
                                            </div>
                                            <div class="col-xs-11">
                                                <!-- delete button retrieves the id and directs to the delete page of the admin-->
                                                <a href="delete_booked_ticket.php?deleteId=<?= $row['ticket_id'];?>" class="btn btn-danger btn-ok">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <?php } ?>
                                         
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>              
</aside>
