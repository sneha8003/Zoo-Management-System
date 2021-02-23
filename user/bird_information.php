<?php
include'../connection/connection.php';//includes connection to database
include'user_header.php';// includes header 

if (isset($_GET['id'])) {
    //selects the record of bird from the bird table
    $bird_information = $connection->prepare("SELECT * FROM bird WHERE id = :id");
    //the records are retrieved 
    $bird_information->execute($_GET);
    //the records are stored in the variable
    $info = $bird_information->fetch();
}
?>
    <!-- displays the record of animals within the particular title  -->
    <div class="container info">
        <div class="col-md-6 record">
        <label>Animal Photo</label>
        <!-- displays the photo of animal -->
        <p><?php echo '<img style="width: 150px; height:100px;" src="../img/'.$info['photo'].'">';?></p>
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
        <label>Nest Construction Method</label>
        <!-- display nest construction method -->
        <p><?php echo $info['bird_net_construction'];?></p>
        <label>Wing Span</label>
        <!-- display wing span -->
        <p><?php echo $info['bird_wing_span'];?></p>
        <label>Ability to Fly</label>
        <!-- display ability to fly -->
        <p><?php echo $info['bird_ability_fly'];?></p>
        <label>Bird Plumage</label>
        <!-- display plumage -->
        <p><?php echo $info['bird_plumage'];?></p>
        </div>
    </div>

<?php include 'footer.php';?><!-- includes footer    -->                             