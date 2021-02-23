<?php
ob_start();//output buffering is started
include '../connection/connection.php';//includes connection
include 'admin_header.php';// includes header 
include 'admin_sidebar.php';// includes sidebar

if (isset($_POST['edit'])) {
    //updates the entered new value and sets at the particular textfield of the database
    $edit_zookeeper = $connection->prepare("UPDATE register SET firstname=:firstname, lastname=:lastname, address=:address, email=:email, contact=:contact, date_of_birth=:date_of_birth, gender=:gender WHERE id = :id");

    //stores the new value in the particular textfields 
    $zookeeper=[
        'id'=>$_POST['id'],
        'firstname'=>$_POST['new_first'],
        'lastname'=>$_POST['new_last'],
        'address'=>$_POST['new_address'],
        'email'=>$_POST['new_email'],
        'contact'=>$_POST['new_contact'],
        'date_of_birth'=>$_POST['new_date_of_birth'],
        'gender'=>$_POST['new_gender']
    ];

    //executes the records and directs to the page where zookeepers are displayed
    $edit_zookeeper->execute($zookeeper);
    header('location:view_zookeeper.php');
}

if (isset($_GET['id'])) {
    //selects the previous entered record of sponsors from the register table
    $edit_zookeeper = $connection->prepare("SELECT * FROM register WHERE id = :id");
    //the records are retrieved 
    $edit_zookeeper->execute($_GET);
    //the records are stored in the variable
    $zookeeper = $edit_zookeeper->fetch();
}
ob_flush();//output buffering is stopped
?>
            
            <aside class="right-side">
                <section class="content-header">
                    <h1>
                        Edit Zoo Keeper
                    </h1>
                    <!-- displays the path in which page the admin lands-->
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
                        <li class="active"> Zoo Keeper</li>
                        <li class="active">View Zoo Keeper</li>
                        <li class="active">Edit Zoo Keeper</li>
                    </ol>
                </section>
                
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box box-primary">
                                <!-- without the value in every fields the record doesnot gets submitted because of the validation-->
                                <form role="form" method="POST">
                                    <div class="box-body">
                                        <div class="form-group">
                                        <!-- id of the zookeepers are retrieved from the database and is kept hidden -->
                                            <input type="hidden" name="id" class="form-control" id="name" value ="<?php echo $_GET['id']?>">
                                        </div>

                                        <div class="form-group">
                                            <label>Firstame</label>
                                            <!-- previous stored firstname is retrieved in the textbox and data in the textbox are able to replace with new value-->
                                            <input type="firstname" name="new_first" class="form-control" id="name" placeholder="Enter firstname" value="<?php echo $zookeeper['firstname']?>"required>
                                        </div>

                                        <div class="form-group">
                                            <label>Lastname</label>
                                            <!-- previous stored lastname is retrieved in the textbox and data in the textbox are able to replace with new value-->
                                            <input type="lastname" name="new_last" class="form-control" id="name" placeholder="Enter lastname" value="<?php echo $zookeeper['lastname']?>"required>
                                        </div>

                                        <div class="form-group">
                                            <label>Address</label>
                                            <!-- previous stored address is retrieved in the textbox and data in the textbox are able to replace with new value-->
                                            <input type="address" name="new_address" class="form-control" id="address" placeholder="Enter address" value="<?php echo $zookeeper['address']?>"required>
                                        </div>

                                         <div class="form-group">
                                            <label>Email Address</label>
                                            <!-- previous stored email address is retrieved in the textbox and data in the textbox are able to replace with new value-->
                                            <input type="email" name="new_email" class="form-control" id="email" placeholder="Enter email address" value="<?php echo $zookeeper['email']?>"required>
                                        </div>

                                        <div class="form-group">
                                        <label>Phone Number</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-phone"></i>
                                            </div>
                                            <!-- previous stored phone number is retrieved in the textbox and data in the textbox are able to replace with new value where maximum digits of phone number is 10-->
                                           <input type="contact" name="new_contact"  maxlength="10" class="form-control" id="contact1" placeholder="Enter contact number" value="<?php echo $zookeeper['contact']?>"required>
                                        </div>
                                        </div>

                                        <div class="form-group">
                                        <label>Date of Birth</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <!-- previous stored date of birth is retrieved in the textbox and data in the textbox are able to replace with new value-->
                                            <input type="Date" name="new_date_of_birth" class="form-control" value="<?php echo $zookeeper['date_of_birth']?>"required>
                                        </div>
                                        </div>

                                         <!-- radio option for gender  -->
                                        <div class="form-group"> 
                                            <label>Gender</label>
                                            <div  class="radio">
                                                 <!-- previous stored value is retrieved in the radio button and are able to replace with new value-->
                                                <label>
                                                    <input name="new_gender" type="radio" value="Male" <?php if($zookeeper['gender']=='Male') {echo 'checked';} ?> id="optionsRadios1" checked>
                                                    Male
                                                </label>
                                                <label>
                                                    <input name="new_gender" type="radio" value="Female" id="optionsRadios2" <?php if($zookeeper['gender']=='Female') {echo 'checked';}?>>
                                                    Female
                                                </label>
                                                 <label>
                                                    <input name="new_gender" type="radio" value="Others" id="optionsRadios2" <?php if($zookeeper['gender']=='Others') {echo 'checked';}?>>
                                                    Others
                                                </label>
                                            </div>
                                        </div>  
                
                                    <!-- edits to the database when submit button is pressed--> 
                                    <div class="box-footer">
                                        <button type="submit" name="edit" value="edit" class="btn btn-primary">Submit</button>
                                    </div>  
                                </div>                     
                                </form>
                            </div>
                        </div>
                    </div> 
                </section>
            </aside>
