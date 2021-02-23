<?php
ob_start();//starts the output buffering
session_start();//starts session
include '../connection/connection.php';//connection to the database
include 'user_header.php';//includes the header

//consists of null value
$error_alert='';
$success_alert='';

//when form is submitted
if (isset($_POST['register'])){
    //inserts the entered value of the particular textbox into the register table of the database
   $add_user=$connection->prepare("INSERT INTO register(firstname,lastname,address,email,contact,date_of_birth,gender,username,password,user_type) VALUES (:firstname,:lastname,:address,:email,:contact,:date_of_birth,:gender,:username,:password,:user_type)");
     
     //the entered value in the particular textfield are stored
     $users=[
     'firstname'=>$_POST['firstname'],
     'lastname'=>$_POST['lastname'],
     'address'=>$_POST['address'],
     'email'=>$_POST['email'],
     'contact'=>$_POST['contact'],
     'date_of_birth'=>$_POST['date_of_birth'],
     'gender'=>$_POST['gender'],
     'username'=>$_POST['username'],
     'user_type'=>$_POST['user_type'],
     'password'=>password_hash($_POST['password'],PASSWORD_DEFAULT)//the entered password in the textfield of password gets inserted in 
      ];

    //when all the value from the fields are inserted then success message is stored in the variable
    if($add_user->execute($users)){
      $success_alert='Inserted Successfully!!';
    }
    else
     //when all the value from the fields are not inserted then error message is stored in the variable
    $error_alert="Not Inserted!!";
}
?>
<div class="container register">
   <div class="col-md-3">
    </div>
        <div class="col-md-6">
        <!-- displays the error and success message in the alert box -->
        <?php
        if($success_alert != '') {
          echo "<script>alert('".$success_alert."')</script>";
          }
          if($error_alert != '') {
          echo "<script>alert('".$error_alert."')</script>";
          }
        ?> 
        <!-- form for adding the zookeepers where validation are applied to every form-->
        <form role="form" method="POST">
        <center><h4>Register</h4><hr></center>

        <label>Firstname</label>
       <!--  textfield for firstname where value are entered -->
        <input type="text" class="form-control" name="firstname" placeholder="Enter firstname" required>

         <label>Lastname</label>
         <!--  textfield for lastname where value are entered -->
        <input type="text" class="form-control" name="lastname" placeholder="Enter lastname" required>

        <label>Address</label>
        <!--  textfield for address where value are entered -->
        <input type="text" name="address" class="form-control" placeholder="Enter address" required>
                                     
        <label for="email">Email</label>
        <!--  textfield for email where value are entered -->
        <input type="email" name="email" class="form-control" placeholder="Enter email" required>

        <label>Phone Number</label>
        <div class="input-group">
          <div class="input-group-addon">
          <i class="fa fa-phone"></i>
          </div>
          <!-- phone number are not able to excedd 10 digits -->
          <input type="contact" name="contact" maxlength="10" class="form-control" id="contact1" placeholder="Enter contact number" required>
        </div>

        <div class="form-group">
          <label>Date of Birth</label>
          <div class="input-group">
            <div class="input-group-addon">
              <i class="fa fa-calendar"></i>
            </div>
          <!-- textfield which contains date format -->
          <input type="Date" name="date_of_birth" class="form-control" required>
          </div>
        </div>
                        
         <!-- radio buttons for the gender -->            
        <div class="form-group"> 
        <label>Gender</label>
          <div  class="radio">
            <label>
               <!-- At the beginning male value is checked -->
              <input type="radio" name="gender" value="Male" checked>
              Male
          </label>
          <label>
            <!-- option value for female -->
            <input type="radio" name="gender" value="Female">
            Female
          </label>
          <label>
          <!-- option value for others -->
          <input type="radio" name="gender" value="others">
          Others
          </label>
        </div>
        </div> 
        
        <label>Username</label>
        <!--  textfield for username where value are entered -->
        <input type="text" class="form-control" name="username" placeholder="Enter username" required>

        <label>Password</label>
        <!-- entered password are in hidden format -->
        <input type="password" class="form-control" name="password" placeholder="Enter password" required>

        <div class="form-group">
        <!-- sends user as value for user type and kept as hidden -->
          <input type="hidden" name="user_type" value="user" class="form-control">
        </div>

        <br>
        <!-- submit button submits the form -->
        <center><button type="submit" name="register" value="register" class="btn btn-primary">Register</button></center>
      
        <div>
       <!--  directs to the login page -->
        <p>Already a Member? <a href="login.php">Login</a></p>
        </div>

      </form>
      </div>
    </div>
    </div>
    <?php include'footer.php';?> <!-- includes footer -->