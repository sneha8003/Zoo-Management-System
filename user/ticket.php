<?php
session_start();//starts session
include'../connection/connection.php';//includes connection to database
include'user_header.php';// includes header 

// the variable consists of null value
$error_alert='';
$success_alert='';

//when the form is submitted
if (isset($_POST['book'])){
    //inserts into the ticket table of the database
   $book_ticket=$connection->prepare("INSERT INTO ticket(ticket_date,username,child_under,child_quantity,adult_quantity) VALUES (:ticket_date,:username,:child_under,:child_quantity,:adult_quantity)");

   //stores the entered value at the particular textfield
    $book=[
    'ticket_date'=>$_POST['ticket_date'],
    'username'=>$_POST['username'],
    'child_under'=>$_POST['child_under'],
     'child_quantity'=>$_POST['child_quantity'],
     'adult_quantity'=>$_POST['adult_quantity']
      ];

    //when all the value from the fields are inserted then success message is stored in the variable
    if($book_ticket->execute($book)){
      $success_alert='Succesfully Booked';
    }
    else
    //when all the value from the fields are not inserted then error message is stored in the variable
    $error_alert="Not Booked!!";
}
?> 

<div class="container ticket">
   <?php
      // displays success message and error message in the alert box
        if($success_alert != '') {
          echo "<script>alert('".$success_alert."')</script>";
          }
          if($error_alert != '') {
          echo "<script>alert('".$error_alert."')</script>";
          }
        ?> 
    <form role="form" method="POST">

  <div class="col-md-12 ticket-form">
			<div class="col-md-3 form-group">
        <label>Date</label>
        <div class="input-group">
          <div class="input-group-addon">
          <i class="fa fa-calendar"></i>
          </div>
          <!-- date for the visiting the zoo -->
          <input type="Date" name="ticket_date" class="form-control" class="form-control" required>
          </div>
      </div>
        </div>

       <?php 
       // session set for the logged in user
        if (isset($_SESSION['login_session'])) {
        ?>
        <!-- the username is inserted of those users who books the ticket -->
        <input type="hidden" name="username" value="<?php echo $_SESSION['login_session']?>">
      <?php }?>

  <div class="col-md-12 ticket-form">
    <!-- visitors category -->
    <div class="col-md-3">
      <div>
      <p>Child</p>
      </div>
      <br>
      <div>
      <p>Child</p>
      </div>
      <br>
      <div>
      <p>Adult</p>
      </div>
    </div>

    <!-- age of the visitors -->
    <div class="col-md-3">
      <div>
      <p>0-3</p>
      </div>
      <br>
      <div>
      <p>3-15 years</p>
      </div>
      <br>
       <div>
      <p>15 above</p>
      </div>
    </div>

   <!--  price for the visitors -->
     <div class="col-md-3">
        <div>
         <p>Free</p>
        </div>
        <br>
         <div>
         <p>£5</p>
        </div>
        <br>
        <div>
        <p>£10</p>
        </div>

        </div>

  <!-- quantity of the visitors -->
   <div class="col-md-3">
        <div>
         <input type="text" class="form-control" name="child_under" placeholder="Quantity" required>
        </div>
        <br>
        <div>
         <input type="text" class="form-control" name="child_quantity" placeholder="Quantity" required>
        </div>
        <br>
        <div>
        <input type="text" class="form-control" name="adult_quantity" placeholder="Quantity" required>
        </div>
        <br>
  </div>

  <div class="pull-right">
  <?php
  // when the user is not logged in directs tp the login page
  if(!isset($_SESSION['login_session']))                                      
  echo '<a href="login.php" class="btn btn-primary">Book</a>';
  // when the user logs in the user can book the ticket
  if(isset($_SESSION['login_session']))
   echo '<button type="submit" name="book" value="book" class="btn btn-primary">Book</button>';
  ?> 
  </div> 

  </div>

</form>
</div>
<?php include 'footer.php'?><!-- includes footer -->
