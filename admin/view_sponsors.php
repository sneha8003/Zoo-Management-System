<?php
include '../connection/connection.php';//connection to the database
include 'admin_header.php';// includes header 
include 'admin_sidebar.php';// includes sidebar

//selects the users whose user type is user from the sponsor table of the database
$view_sponsors=$connection->prepare("SELECT * FROM sponsor");
//executes the selected rows and stored in the variable
$view_sponsors ->execute();
?>

<aside class="right-side">   
    <section class="content-header">
        <h1>View Sponsors</h1>
            <!-- displays the path in which page the admin lands-->
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Sponsors</a></li>
                    <li class="active">View</li>
                </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <!-- table for displaying the records of the sponsors-->
                    <div class="box-body table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <!-- headings of the column -->
                                        <th>SN</th> 
                                        <th>Name</th> 
                                        <th>Existing Customer</th>  
                                        <th>ID</th>
                                        <th>primary Telephone</th>  
                                        <th>Secondary Telephone</th>  
                                        <th>Address</th>  
                                        <th>Sponsored Animal</th>  
                                        <th>Animal Location</th> 
                                        <th>Sponsorship Band</th> 
                                        <th>Total Price</th> 
                                        <th>Agreement Period</th> 
                                        <th>Signage Area</th> 
                                        <th>Signage</th> 
                                        <th>Special Note</th> 
                                        <th>Agree to Agreement</th> 
                                        <th>Agreement Signed Name</th>
                                        <th>Agreement Signed Date</th>
                                        <th>Payment Details</th> 
                                        <th>Payment Received</th> 
                                        <th>review Date</th> 
                                        <th>Signed Name</th> 
                                        <th>Action</th>     
                                    </tr>
                                </thead>

                                <?php
                                $sn=1;
                                foreach ($view_sponsors as $row) {
                                ?>
                                    <tr>
                                        <td><?php echo $sn++;?></td>
                                        <!-- displays the record  of the sponsors in particular column-->
                                        <td><?php echo $row['name'];?></td>
                                        <td><?php echo $row['existing_customer'];?></td>
                                        <td><?php echo $row['id'];?></td>
                                        <td><?php echo $row['primary_telephone'];?></td>
                                        <td><?php echo $row['secondary_telephone'];?></td>
                                        <td><?php echo $row['address'];?></td>
                                        <td><?php echo $row['sponsored_animal'];?></td>
                                        <td><?php echo $row['location'];?></td>
                                        <td><?php echo $row['sponsorship_band'];?></td>
                                        <td><?php echo $row['price'];?></td>
                                        <td><?php echo $row['agreement_period'];?></td>
                                        <td><?php echo $row['signage_area'];?></td>
                                        <!-- displays the image along with the respective width and height--> 
                                        <td><?php echo '<img style="width: 150px; height:100px;" src="../img/'.$row['photo'].'">';?></td>
                                        <td><?php echo $row['note'];?></td>
                                        <td><?php echo $row['agreement'];?></td>
                                        <td><?php echo $row['signed_name'];?></td>
                                        <td><?php echo $row['signed_date'];?></td>
                                        <td><?php echo $row['payment'];?></td>
                                        <td><?php echo $row['payment_received'];?></td>
                                        <td><?php echo $row['review_date'];?></td>
                                        <td><?php echo $row['signed'];?></td>
                                        <td>
                                         <!-- edit button which retrieves the id of the particular sponsor and directs to the page where the records are updated of the selected sponsor--> 
                                         <a href="edit_sponsors.php?sponsor_id=<?php echo $row['sponsor_id'];?>" class="btn btn-warning"><i class="fa fa-edit"></i> Edit</a>
                                         <!-- delete button which retrieves the id of the particular sponsor-->
                                        <a href="#delete<?= $row['sponsor_id'];?>" class="btn btn-danger" data-toggle="modal"><i class="fa fa-trash-o"></i> Delete</a> 
                                        </td>
                                    </tr>

                        <!-- confirmation for the deletion of the sponsor records -->
                        <div class="modal fade" id="delete<?= $row['sponsor_id'];?>" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <!-- cross icon dismiss the confirmation modal of deletion of sponsor-->
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure want to delete sponsor record?
                                        </div>
                                        <div class="modal-footer">
                                            <div class="col-xs-1">
                                                <!-- cancel button dismiss the modal -->
                                                <a class="btn btn-default" data-dismiss="modal">Cancel</a>
                                            </div>
                                            <div class="col-xs-11">
                                                <!-- delete button retrieves the id and directs to the delete page of the admin-->
                                                <a href="delete_sponsors.php?deleteId=<?= $row['sponsor_id'];?>" class="btn btn-danger btn-ok">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <?php }?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>              
</aside>