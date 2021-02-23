<?php
ob_start();//starts the output buffering
session_start();//starts the session
include '../connection/connection.php';//connection to the database
include 'user_header.php';//includes the header

//conatains null value
$error_alert='';
            
if (isset($_POST['login'])) {
  // selects the username  from register table of database
  $register= $connection->prepare("SELECT * FROM register WHERE username= :username");

  $login=[
    'username' => $_POST['username']
  ];
  $register-> execute($login);
  if($register-> rowCount() >0){
    $users = $register -> fetch();

    if(password_verify($_POST['password'],$users['password'])){//checks the row password and the entered password
      
      // when the admin username and password matches directs to the admin homepage
      if ($users['user_type']=='admin'){
         $_SESSION['login_session']=$users['username'];
      header('Location:../admin/admin_home.php');
      }
      // when the user username and password matches directs to the user homepage
      else if ($users['user_type']=='user'){
      $_SESSION['login_session']=$users['username'];
      header('Location:../user/ticket.php');
      }
      // when the zookeeper username and password matches directs to the zookeeper homepage
      else if ($users['user_type']=='zookeeper') {
          $_SESSION['login_session'] = $users['username'];
      header('Location:../zookeeper/zookeeper_home.php');
      }
      // when username and password donot matches error messages are stored in the variable
      else 
      {
         $error_alert= 'Enter correct username';
      }
    }
    else 
      $error_alert= 'Enter correct password';
  }
  else{
    $error_alert= 'Enter correct username or password';

  }
}
ob_flush();//output buffering stops
?>
  <div class="container login">
    <div class="col-md-3">
    </div>
        <div class="col-md-6">
        <?php
        // displays the error message in the alertbox
          if($error_alert != '') {
          echo "<script>alert('".$error_alert."')</script>";
          }
        ?>
        <!-- form for login where validation are applied to every form-->
        <form role="form" method="POST">
        <center><h4>Login</h4><hr></center>
        <!-- textfield for username  -->
        <label>Username</label>
        <input type="text" class="form-control" name="username" placeholder="Enter username" required>
        <!-- textfield for password where password is in hidden format-->
        <label>Password</label>
        <input type="password" class="form-control" name="password" placeholder="Enter password" required>
        <br>
       <!--  login button submits the form-->
        <center><button type="submit" name="login" value="login" class="btn btn-primary">Login</button></center>
      
         <div>
        <!-- directs to the register page -->
        <p>New User? <a href="register.php">Register</a></p>
        </div>
        </div>
      </form>
      </div>
    </div>
    <?php include'footer.php';?><!-- includes footer -->
