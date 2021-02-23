<?php
include '../connection/connection.php';//conection to the database
include 'zookeeper_header.php';//conection to the header
include 'zookeeper_sidebar.php';//conection to the sidebar

//selects birds records from the bird table of the database
$view_bird=$connection->prepare("SELECT * FROM bird");
//executes the selected rows
$view_bird ->execute();
?>
<aside class="right-side">   
    <section class="content-header">
        <h1>
        View Bird
        </h1>
        <!-- displays the path in which page the admin lands-->
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Animals</a></li>
            <li class="active">View Bird</li>
        </ol>
    </section>

    <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <!-- table for displaying the records -->
                                <div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
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
                                            <th>Captivity or Wild</th>  
                                            <th>Date Joined</th> 
                                            <th>Dimension</th>  
                                            <th>Average Dimension</th>  
                                            <th>Life Span</th>  
                                            <th>Dietary</th>  
                                            <th>Habitat</th>  
                                            <th>Note</th>  
                                            <th>Nest Construction Method</th> 
                                            <th>Clutch Size</th> 
                                            <th>Wing Span</th> 
                                            <th>Ability to Fly</th> 
                                            <th>Plumage Colour Variants</th> 
                                        </tr>
                                        </thead>

                                        <?php
                                        $sn=1;
                                        foreach ($view_bird as $row) {
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
                                            <td><?php echo $row['bird_net_construction'];?></td>  
                                            <td><?php echo $row['bird_clutch'];?></td>  
                                            <td><?php echo $row['bird_wing_span'];?></td>  
                                            <td><?php echo $row['bird_ability_fly'];?></td>  
                                            <td><?php echo $row['bird_plumage'];?></td>  
   
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
