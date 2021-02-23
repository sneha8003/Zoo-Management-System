<?php
include'../connection/connection.php';//includes connection to database
include'user_header.php';// includes header 

if (isset($_GET['id'])) {
    //selects the record of mammal from the mammal table
    $mammal_information = $connection->prepare("SELECT * FROM mammal WHERE id = :id");
     //the records are retrieved 
    $mammal_information->execute($_GET);
    //the records are stored in the variable
    $info = $mammal_information->fetch();
}
?> 
    <!-- displays the record of animals within the particular title  -->
    <div class="container info">
        <div class="col-md-6 record">
        <label>Animal Photo</label>
         <!-- displays the photo of animal -->
        <p><?php echo '<img style="width: 150px; height:100px;" src="../img/'.$info['photo'].'">';?></p>
        <label>Species</label>
        <!-- display species -->
        <p><?php echo $info['species'];?></p>
        <label>Category</label>
        <!-- display category -->
        <p><?php echo $info['category'];?></p>
        <label>Name</label>
        <!-- display name -->
        <p><?php echo $info['name'];?></p>
        <label>Date of Birth</label>
        <!-- display date of birth -->
        <p><?php echo $info['date_of_birth'];?></p>
        <label>Location</label>
        <!-- display location -->
        <p><?php echo $info['location'];?></p>
        <label>Status</label>
        <!-- display status -->
        <p><?php echo $info['captivity_wild'];?></p>
        <label>Date Joined</label>
        <!-- display date joined -->
        <p><?php echo $info['date_joined'];?></p>
    </div>
    <div class="col-md-6 record">
        <label>Dimension </label>
        <!-- display dimension -->
        <p><?php echo $info['dimension'];?></p>
        <label>Average Dimension</label>
        <!-- display average dimension -->
        <p><?php echo $info['average_dimension'];?></p>
        <label>Life Span</label>
        <!-- display life span -->
        <p><?php echo $info['life'];?></p>
        <label>Dietary</label>
        <!-- display dietary -->
        <p><?php echo $info['dietary'];?></p>
        <label>Habitat</label>
        <!-- display habitat -->
        <p><?php echo $info['habitat'];?></p>
        <label>Note</label>
        <!-- display note -->
        <p><?php echo $info['note'];?></p>
        <label>Gestational Period</label>
        <!-- display gestational period -->
        <p><?php echo $info['gestational'];?></p>
        <label>Mammal Category</label>
        <!-- display mammal category -->
        <p><?php echo $info['mammal_category'];?></p>
        <label>Colour Varianats</label>
        <!-- display mammal colour variants -->
        <p><?php echo $info['mammal_colour'];?></p>
        </div>
    </div>

<!-- includes footer     -->                         
<?php include 'footer.php';?>  

                                     
                                            
                                   