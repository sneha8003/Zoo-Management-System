<?php
include'../connection/connection.php';//connection to the database
include'admin_header.php';//includes header for the page
include'admin_sidebar.php';//includes sidebar for the page

//consists of null value
$error_alert='';
$success_alert='';

//when form gets submitted
if (isset($_POST['submit'])){
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
     'password'=>password_hash($_POST['password'],PASSWORD_DEFAULT) //the entered password in the textfield of password gets inserted in hash form
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
            <aside class="right-side">
                <section class="content-header">
                    <h1>
                        Add Zookeper
                    </h1>
                    <!-- displays the path in which page the user lands-->
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#">Zoo Keeper</a></li>
                        <li class="active">Add</li>
                    </ol>
                </section>

                <section class="content">
                    <div class="row">
                        <!-- displays the error and success message in the alert box -->
                        <div class="col-md-12">
                        <?php
                        if($error_alert != '') {
                            echo "<script>alert('".$error_alert."')</script>";
                        }
                        elseif($success_alert != '') {
                            echo "<script>alert('".$success_alert."')</script>";
                        }
                        ?>
                            <div class="box box-primary">
                                <!-- form for adding the zookeepers where validation are applied to every form-->
                                <form role="form" method="POST">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <!--  textfield for firstname  where value are entered-->
                                            <label>Firstname</label>
                                            <input type="text" name="firstname" class="form-control" placeholder="Enter firstname"required>
                                        </div>

                                        <div class="form-group">
                                            <!--  textfield for lastname where value are entered-->
                                            <label>Lastname</label>
                                            <input type="text" name="lastname" class="form-control" placeholder="Enter lastname"required>
                                        </div>

                                        <div class="form-group">
                                            <!--  textfield for address where value are entered-->
                                            <label>Address</label>
                                            <input type="text" name="address" class="form-control" placeholder="Enter address"required>
                                        </div>

                                        <div class="form-group">
                                            <label>Email</label>
                                           <!--  textfield for email address where value are entered-->
                                            <input type="email" name="email" class="form-control" placeholder="Enter email address"required>
                                        </div>

                                        <div class="form-group">
                                        <label>Phone Number</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-phone"></i>
                                            </div>
                                            <!-- phone number is not able to exceed 10 digits -->
                                           <input type="contact" name="contact"  maxlength="10" class="form-control" id="contact1" placeholder="Enter contact number"required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Date of Birth</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <!-- textfield which contains date format -->
                                            <input type="Date" name="date_of_birth" class="form-control"required>
                                        </div>
                                    </div>
                                    
                                    <!-- radio buttons for the gender -->
                                      <div class="form-group"> 
                                            <label>Gender</label>
                                            <div  class="radio">
                                                <label>
                                                    <!-- At the beginning male value is checked -->
                                                    <input type="radio" name="gender" id="optradio" value="Male" checked>
                                                    Male
                                                </label>
                                                <label>
                                                    <!-- option value for female -->
                                                    <input type="radio" name="gender" id="optradio1" value="Female">
                                                    Female
                                                </label>
                                                <label>
                                                    <!-- option value for others -->
                                                    <input type="radio" name="gender" id="optradio1" value="others">
                                                    Others
                                                </label>
                                            </div>
                                        </div> 

                                        <div class="form-group">
                                            <!--  textfield for username where value are entered-->
                                            <label>Username</label>
                                            <input type="text" name="username" class="form-control" placeholder="Enter username"required>
                                        </div>

                                        <div class="form-group">
                                            <label>Password</label>
                                           <!--  entered password are in hidden format -->
                                            <input type="password" name="password" class="form-control" placeholder="Enter password"required>
                                        </div>

                                        <div class="form-group">
                                        <!-- sends zookeeper as value for user type and kept as hidden -->
                                        <input type="hidden" name="user_type" value="zookeeper" class="form-control">
                                        </div>

                                    <div class="box-footer">
                                        <!-- submit button submits the form -->
                                        <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>   
                </section>
            </aside>