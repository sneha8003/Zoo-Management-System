<?php
include '../connection/connection.php';//connection to the database
include 'admin_header.php';// includes header 
include 'admin_sidebar.php';// includes sidebar

//selects the records from the ticket table of the database whose value of archive booked ticket is true
$booked_ticket=$connection->prepare("SELECT * FROM ticket WHERE archive_ticket='true'");
//the records are executed
$booked_ticket ->execute();
?>
<aside class="right-side">   
    <section class="content-header">
        <h1>Archived Booked Ticket</h1>
            <!-- displays the path in which page the admin lands-->
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Archived Booked Ticket</a></li>
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
                                  
                                 </tr>
                                 <?php } ?>
                             </table>
                        </div>          
                    </div>
                </div>
            </div>
    </section>              
</aside>
