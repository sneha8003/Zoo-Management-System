<?php
include '../connection/connection.php';//connection to the database
include 'admin_header.php';// includes header 
include 'admin_sidebar.php';// includes sidebar

//selects the users whose user type is zookeeper from the register table of the database
$view_zookeeper=$connection->prepare("SELECT * FROM register WHERE user_type='zookeeper'");
//executes the selected rows and stored in the variable
$view_zookeeper ->execute();
?>

<aside class="right-side">   
    <section class="content-header">
    <h1>View Zoo Keeper</h1>
    <!-- displays the path in which page the admin lands-->
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Zoo Keeper</a></li>
        <li class="active">View</li>
    </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <!-- table for displaying the records of the zookeeper-->
                    <div class="box-body table-responsive">
                        <table id="example1" class="table table-bordered table-striped" style="width: 100%;">
                            <thead>
                                <tr>
                                    <!-- headings of the particular column -->
                                    <th>SN</th> 
                                    <th>Firstname</th>  
                                    <th>Lastname</th>
                                    <th>Address</th>  
                                    <th>Email</th>  
                                    <th>Contact</th>  
                                    <th>Date of Birth</th>  
                                    <th>Gender</th> 
                                    <th>Action</th>     
                                </tr>
                            </thead>

                            <?php
                            //starting serial number for the rows from 1
                            $sn=1;
                            foreach ($view_zookeeper as $row) {
                            ?>
                            <tr>
                                <!-- increases the serial number -->
                                <td><?php echo $sn++;?></td>
                                <!-- displays the record of the zookeeper in the particular column -->
                                <td><?php echo $row['firstname'];?></td>
                                <td><?php echo $row['lastname'];?></td>
                                <td><?php echo $row['address'];?></td>
                                <td><?php echo $row['email'];?></td>
                                <td><?php echo $row['contact'];?></td>
                                <td><?php echo $row['date_of_birth'];?></td>
                                <td><?php echo $row['gender'];?></td>
                                <td>
                                <!-- retrieves the id of the particular zookeeper and directs to the page where the records are updated--> 
                                <a href="edit_zookeeper.php?id=<?php echo $row['id'];?>" class="btn btn-warning"><i class="fa fa-edit"></i> Edit</a>
                                <!-- delete button which retrieves the id of the particular zookeeper-->
                                <a href="#delete<?= $row['id'];?>" class="btn btn-danger" data-toggle="modal"><i class="fa fa-trash-o"></i> Delete</a> 
                                </td>
                            </tr>

                        <!-- confirmation for the deletion of the zookeeper records -->
                        <div class="modal fade" id="delete<?= $row['id'];?>" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <!-- cross icon dismiss the confirmation modal of deletion of zookeeper-->
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure want to delete this zookeeper?
                                    </div>
                                     <div class="modal-footer">
                                        <div class="col-xs-1">
                                            <!-- cancel button dismiss the modal -->
                                            <a class="btn btn-default" data-dismiss="modal">Cancel</a>
                                        </div>
                                        <div class="col-xs-11">
                                            <!-- delete button retrieves the id and directs to the delete page of the zookeeper-->
                                            <a href="delete_zookeeper.php?deleteId=<?= $row['id'];?>" class="btn btn-danger btn-ok">Delete</a>
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
