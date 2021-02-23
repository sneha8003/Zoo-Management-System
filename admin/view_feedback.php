<?php
include '../connection/connection.php';//includes connection to teh database
include 'admin_header.php';// includes header 
include 'admin_sidebar.php';// includes sidebar

//selects the feedbacks from the feedback table of the database whose value of archive feedback is false
$view_feedback=$connection->prepare("SELECT * FROM feedback WHERE archive_feedback='false'");
//executes the selected rows and stored in the variable
$view_feedback ->execute();
?>

<aside class="right-side">   
    <section class="content-header">
        <h1>Feedback</h1>
        <!-- displays the path in which page the admin lands-->
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Feedback</a></li>
        </ol>
    </section>
          
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <!-- table which displays the feedback of the users-->
                    <div class="box-body table-responsive">
                        <table id="example1" class="table table-bordered table-striped" style="width: 100%;">
                            <thead>
                                <tr>
                                    <!-- headings of the particular column -->
                                    <th>SN</th> 
                                    <th>Name</th>  
                                    <th>Message</th> 
                                    <th>Action</th>     
                                </tr>
                             </thead>

                                <?php
                                //starting serial number for the rows from 1
                                $sn=1;
                                foreach ($view_feedback as $row) {
                                ?>
                                <tr>
                                    <!-- increases the serial number -->
                                    <td><?php echo $sn++;?></td>
                                    <!-- displays the feedback of the user in the particular column -->
                                    <td><?php echo $row['name'];?></td>
                                    <td><?php echo $row['message'];?></td>
                                    <td>
                                     <!-- archive button which retrieves the id of the particular feedback and leads to the confirmation modal-->
                                    <a href="#archive<?= $row['feedback_id'];?>" class="btn btn-success" data-toggle="modal"><i class="fa fa-minus-circle"></i> Archive</a> 

                                    <!-- delete button which retrieves the id of the particular feedback and leads to the confirmation modal-->
                                    <a href="#delete<?= $row['feedback_id'];?>" class="btn btn-danger" data-toggle="modal"><i class="fa fa-trash-o"></i> Delete</a> 
                                    </td>
                                </tr>

                         <!-- confirmation modal to archive the feedback -->
                        <div class="modal fade" id="archive<?= $row['feedback_id'];?>" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <!-- cross icon dismiss the confirmation modal of deletion of feedback-->
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure want to archive the feedback?
                                    </div>
                                    <div class="modal-footer">
                                        <div class="col-xs-1">
                                            <!-- cancel button dismiss the modal -->
                                            <a class="btn btn-default" data-dismiss="modal">Cancel</a>
                                        </div>
                                        <div class="col-xs-11">
                                            <!-- archive button retrieves the id and directs to the archive feedback  page -->
                                            <a href="archive_feedback.php?archiveId=<?= $row['feedback_id'];?>" class="btn btn-success">Archive</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- confirmation modal for the deletion of the feedback -->
                        <div class="modal fade" id="delete<?= $row['feedback_id'];?>" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <!-- cross icon dismiss the confirmation modal of deletion of feedback-->
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure want to delete the feedback?
                                    </div>
                                    <div class="modal-footer">
                                        <div class="col-xs-1">
                                            <!-- cancel button dismiss the modal -->
                                            <a class="btn btn-default" data-dismiss="modal">Cancel</a>
                                        </div>
                                        <div class="col-xs-11">
                                            <!-- delete button retrieves the id and directs to the delete page of the feedback-->
                                            <a href="delete_feedback.php?deleteId=<?= $row['feedback_id'];?>" class="btn btn-danger btn-ok">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        }
                        ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>           
</aside>