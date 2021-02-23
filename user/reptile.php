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

<div class="container">
<?php
  // selects the reptile records from the reptile table of the database
  $reptile = $connection->prepare("SELECT * FROM reptile");
  // executes the records and runs in the loop 
  $reptile->execute();
  foreach ($reptile as $row) {
?>
  <div class="col-md-3">
    <div class="card">
      <div class="header">
         <!-- id is retrieved and displays image of the added reptile -->
        <a href="reptile_information.php?id=<?php echo $row['id'];?>">
      <?php echo '<img style="width: 100%; height:20%;" src="../img/'.$row['photo'].'">';?>
      </div>
    </a>

      <div class="card-body">
        <!-- displays species of the birds -->
        <h5 class="card-title"><?php echo $row['species'];?></h5>
     </div>
    </div>
    <br>
  </div>
<?php }?> 
</div>

<?php include 'footer.php';?><!-- includes footer -->
