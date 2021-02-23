<?php
include '../connection/connection.php';//includes connection to teh database
include 'admin_header.php';// includes header 
include 'admin_sidebar.php';// includes sidebar

//selects the feedbacks from the feedback table of the database whose value of archive feedback is true
$view_feedback=$connection->prepare("SELECT * FROM feedback WHERE archive_feedback='true'");
//executes the selected rows and stored in the variable
$view_feedback ->execute();
?>

<aside class="right-side">   
    <section class="content-header">
        <h1>Archived Feedback</h1>
        <!-- displays the path in which page the admin lands-->
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Feedback</a></li>
            <li><a href="#">Archived Feedback</a></li>
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
                                </tr>
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