<?php
include '../connection/connection.php';//conection to the database
include 'admin_header.php';// includes header 
include 'admin_sidebar.php';// includes sidebar

//selects mammal records from the mammal table of the database
$view_mammal=$connection->prepare("SELECT * FROM mammal");
//executes the selected rows
$view_mammal ->execute();
?>
<aside class="right-side">   
    <section class="content-header">
        <h1>
        View Mammal
        </h1>
        <!-- displays the path in which page the admin lands-->
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Animals</a></li>
            <li class="active">View Mammal</li>
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
                                            <th>Species</th>  
                                            <th>Category</th>
                                            <th>Name</th>
                                            <th>Photo</th>
                                            <th>Date of Birth</th>
                                            <th>Location</th>  
                                            <th>Status</th>  
                                            <th>Date Joined</th> 
                                            <th>Dimension</th>  
                                            <th>Average Dimension</th>  
                                            <th>Life Span</th>  
                                            <th>Dietary</th>  
                                            <th>Habitat</th>  
                                            <th>Note</th>  
                                            <th>Gestational Period</th> 
                                            <th>Mammal Category</th>
                                            <th>Colour Varianats</th> 
                                            <th>Action</th>     
                                        </tr>
                                        </thead>

                                        <?php
                                        $sn=1;
                                        foreach ($view_mammal as $row) {
                                        ?>
                                        
                                        <tr>
                                            <!-- displays the record from the database in particular column -->
                                            <td><?php echo $sn++;?></td>
                                            <td><?php echo $row['species'];?></td>
                                            <td><?php echo $row['category'];?></td>
                                            <td><?php echo $row['name'];?></td>
                                            <!-- displays the image along with the respective width and height--> 
                                            <td><?php echo '<img style="width: 150px; height:100px;" src="../img/'.$row['photo'].'">';?></td>
                                            <td><?php echo $row['date_of_birth'];?></td>
                                            <td><?php echo $row['location'];?></td>
                                            <td><?php echo $row['captivity_wild'];?></td>
                                            <td><?php echo $row['date_joined'];?></td>
                                            <td><?php echo $row['dimension'];?></td>
                                            <td><?php echo $row['average_dimension'];?></td>
                                            <td><?php echo $row['life'];?></td>
                                            <td><?php echo $row['dietary'];?></td>
                                            <td><?php echo $row['habitat'];?></td>
                                            <td><?php echo $row['note'];?></td>
                                            <td><?php echo $row['gestational'];?></td>
                                            <td><?php echo $row['mammal_category'];?></td>
                                           <td><?php echo $row['mammal_colour'];?></td>   
                                        <td>
                                            
                                         <!-- edit button which retrieves the id of the particular mammal and directs to the page where the records are updated--> 
                                         <a href="edit_mammal.php?id=<?php echo $row['id'];?>" class="btn btn-warning"><i class="fa fa-edit"></i> Edit</a>
                                         <!-- delete button which retrieves the id of the particular mammal and leads to the confirmation -->
                                        <a href="#delete<?= $row['id'];?>" class="btn btn-danger" data-toggle="modal"><i class="fa fa-trash-o"></i> Delete</a> 
                                    </td>
                                </tr>

                                <div class="modal fade" id="delete<?= $row['id'];?>" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <!-- cross icon dismiss the modal and directs to the page where records are displayed-->
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure want to delete this animal record?
                                            </div>
                                        <div class="modal-footer">
                                            <div class="col-xs-1">
                                                <!-- cancel button dismiss the modal -->
                                                <a class="btn btn-default" data-dismiss="modal">Cancel</a>
                                            </div>
                                            <div class="col-xs-11">
                                                <!-- delete button retrieves the id and directs to the delete page of the mammal-->
                                                <a href="delete_mammal.php?deleteId=<?= $row['id'];?>" class="btn btn-danger btn-ok">Delete</a>
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