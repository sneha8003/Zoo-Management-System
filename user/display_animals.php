<?php
include'../connection/connection.php';//includes connection to database
include'user_header.php';// includes header 
?> 
<div class="container-fluid">
<div class="category pull-right" >

  <div class="col-md-3">
    <!-- directs to the page where mammals are displayed -->
   <a href="mammal.php" class="btn btn-default">Mammal</a>
  </div>

  <div class="col-md-2">
    <!-- directs to the page where birds are displayed -->
    <a href="bird.php" class="btn btn-default">Bird</a>
  </div>

  <div class="col-md-2">
    <!-- directs to the page where fish are displayed -->
    <a href="fish.php" class="btn btn-default">Fish</a>
  </div>

    <div class="col-md-2">
      <!-- directs to the page where reptiles are displayed -->
    <a href="reptile.php" class="btn btn-default">Reptile</a>
  </div>

</div>
</div>
<br>

<div class="container animals">
<?php
//selects the records from the animal table of the database and stored in the variable
$display_fish=$connection->prepare("SELECT * FROM fish");
$display_fish ->execute();

  // the variable where reocrds are stored are in a loop
  foreach ($display_fish as $row) {
?>
  <div class="col-md-3">
    <div class="card">
      <div class="header">
      <!-- id is retrieved and displays image of the added fish -->
       <a href="fish_information.php?id=<?php echo $row['id'];?>">
      <?php echo '<img style="width: 100%; height:20%;" src="../img/'.$row['photo'].'">';?>
    </a>
      </div>
      <div class="card-body">
        <!-- displays species of the animal  -->
        <h5 class="card-title"><?php echo $row['species'];?></h5>
     </div>

    </div>
     <br>
</div>
<?php }?> 

<?php
//selects the records from the animal table of the database and stored in the variable
$display_bird=$connection->prepare("SELECT * FROM bird");
$display_bird ->execute();

  // the variable where reocrds are stored are in a loop
  foreach ($display_bird as $row) {
?>
  <div class="col-md-3">
    <div class="card">
      <div class="header">
      <!-- id is retrieved and displays image of the added birds -->
       <a href="bird_information.php?id=<?php echo $row['id'];?>">
      <?php echo '<img style="width: 100%; height:20%;" src="../img/'.$row['photo'].'">';?>
    </a>
      </div>
      <div class="card-body">
        <!-- displays species of the animal  -->
        <h5 class="card-title"><?php echo $row['species'];?></h5>
     </div>

    </div>
     <br>
</div>
<?php }?> 

<?php
//selects the records from the animal table of the database and stored in the variable
$display_mammal=$connection->prepare("SELECT * FROM mammal");
$display_mammal ->execute();

  // the variable where reocrds are stored are in a loop
  foreach ($display_mammal as $row) {
?>
  <div class="col-md-3">
    <div class="card">
      <div class="header">
      <!-- id is retrieved and displays image of the added mammal -->
       <a href="mammal_information.php?id=<?php echo $row['id'];?>">
      <?php echo '<img style="width: 100%; height:20%;" src="../img/'.$row['photo'].'">';?>
      </a>
      </div>
      <div class="card-body animal">
        <!-- displays species  of the animal  -->
        <h5 class="card-title"><?php echo $row['species'];?></h5>
     </div>

    </div>
     <br>
</div>
<?php }?> 

<?php
//selects the records from the animal table of the database and stored in the variable
$display_reptile=$connection->prepare("SELECT * FROM reptile");
$display_reptile ->execute();

  // the variable where reocrds are stored are in a loop
  foreach ($display_reptile as $row) {
?>
  <div class="col-md-3">
    <div class="card">
      <div class="header">
      <!-- id is retrieved and displays image of the added reptile -->
       <a href="reptile_information.php?id=<?php echo $row['id'];?>">
      <?php echo '<img style="width: 100%; height:20%;" src="../img/'.$row['photo'].'">';?>
    </a>      </div>
      <div class="card-body">
        <!-- displays species of the animal  -->
        <h5 class="card-title"><?php echo $row['species'];?></h5>
     </div>

    </div>
     <br>
</div>
<?php }?> 
</div>

<?php include'footer.php';?><!-- includes footer -->
