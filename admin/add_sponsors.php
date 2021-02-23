<?php
include '../connection/connection.php';//connection to the database 
include 'admin_header.php';// includes header for the page
include 'admin_sidebar.php';// includes sidebar for the page

//consists of null value
$error_alert='';
$success_alert='';

//when form gets submitted
if (isset($_POST['submit'])){
   // filename and tempname of the photo
   $file=$_FILES["photo"]["name"];
   $temp=$_FILES["photo"]["tmp_name"];
   // photo is selected from the location 
   $path="../img/".$file;
   // the uploaded path of the file is moved
   move_uploaded_file($temp, $path);

  //inserts the entered value of the particular textbox into the sponsor table of the database
   $add_sponsor=$connection->prepare("INSERT INTO sponsor(name,existing_customer,id,primary_telephone,secondary_telephone,address,sponsored_animal,location,sponsorship_band,price,agreement_period,signage_area,photo,note,agreement,signed_name,signed_date,payment,payment_received,review_date,signed) VALUES (:name,:existing_customer,:id,:primary_telephone,:secondary_telephone,:address,:sponsored_animal,:location,:sponsorship_band,:price,:agreement_period,:signage_area,:photo,:note,:agreement,:signed_name,:signed_date,:payment,:payment_received,:review_date,:signed)");
     
    //the entered value in the particular textfield are stored
     $sponsors=[
     'name'=>$_POST['name'],
     'existing_customer'=>$_POST['existing_customer'],
     'id'=>$_POST['id'],
     'primary_telephone'=>$_POST['primary_telephone'],
     'secondary_telephone'=>$_POST['secondary_telephone'],
     'address'=>$_POST['address'],
     'sponsored_animal'=>$_POST['sponsored_animal'],
     'location'=>$_POST['location'],
     'sponsorship_band'=>$_POST['sponsorship_band'],
     'price'=>$_POST['price'],
     'agreement_period'=>$_POST['agreement_period'],
     'signage_area'=>$_POST['signage_area'],
     'photo'=>$_FILES['photo']['name'],
     'note'=>$_POST['note'],
     'agreement'=>$_POST['agreement'],
     'signed_name'=>$_POST['signed_name'],
     'signed_date'=>$_POST['signed_date'],
     'payment'=>$_POST['payment'],
     'payment_received'=>$_POST['payment_received'],
     'review_date'=>$_POST['review_date'],
     'signed'=>$_POST['signed']
      ];

   //when all the value from the fields are inserted then success message is stored in the variable
    if($add_sponsor->execute($sponsors)){
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
        Add Sponsors
        </h1>
        <!-- displays the path in which page the user lands-->
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Sponsors</a></li>
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
                <div class="col-md-12">
                <div class="box box-primary">
                    <form role="form" method="POST" enctype="multipart/form-data">
                      <!-- form for adding the sponsors where validation are applied to every form-->
                        <div class="box-body">
                            <div class="form-group">
                              <!--  textfield for company name where value are entered-->
                              <label>Client or Company Name</label>
                              <input type="text" name="name" class="form-control" placeholder="Enter name" required>
                            </div>

                              <div class="form-group">
                               	<label>Existing Customer</label> 
                                  <div  class="radio">
                                    <!-- radio button of yes value is checked at the beginning--> 
                                    <label><input type="radio" name="existing_customer" id="optradio" value="Yes" checked> Yes</label>
                                    <label><input type="radio" name="existing_customer" id="optradio" value="No"> No</label>
                                  </div>
                            </div> 

                            <div class="form-group">
                              <!--  textfield for id where value are entered-->
                              <label>ID</label>
                              <input type="text" name="id" class="form-control" placeholder="Enter id" required>
                            </div>

                            <div class="form-group">
                                <label>Primary Telephone Number</label>
                                  <div class="input-group">
                                    <div class="input-group-addon">
                                      <i class="fa fa-phone"></i>
                                    </div>
                                    <!-- primary telephone number is not able to exceed than 10 digits -->
                                    <input type="text" name="primary_telephone"  maxlength="10" class="form-control" placeholder="Enter primary telephone number" required>
                                  </div>
                              </div>

                            <div class="form-group">
                                <label>Secondary Telephone Number</label>
                                  <div class="input-group">
                                    <div class="input-group-addon">
                                      <i class="fa fa-phone"></i>
                                    </div>
                                     <!-- secondary telephone number is not able to exceed than 10 digits -->
                                    <input type="text" name="secondary_telephone"  maxlength="10" class="form-control" placeholder="Enter secondary telephone number" required>
                                  </div>
                              </div>

                            <div class="form-group">
                              <!--  textfield for address where value are entered-->
                              <label>Address</label>
                              <input type="text" name="address" class="form-control" placeholder="Enter address" required>
                            </div>

                             <div class="form-group">
                            <!--  textfield for sponsored animal where value are entered-->
                            <label>Sponsored Animal</label>
                            <input type="text" name="sponsored_animal" class="form-control" placeholder="Enter sponsored animal" required>
                            </div>

                            <div class="form-group">
                            <!--  textfield for location of animal where value are entered-->
                            <label>Animal Location</label>
                            <input type="text" name="location" class="form-control" placeholder="Enter animal location" required>
                            </div>

                            <div class="form-group">
                            <!--  textfield for sponsorship band where value are entered-->
                            <label>Sponsorship Band</label>
                            <input type="text" name="sponsorship_band" class="form-control" placeholder="Enter Sponsorship band" required>
                            </div>

                            <div class="form-group">
                            <!--  textfield for total price where value are entered-->
                            <label>Total Price</label>
                            <input type="text" name="price" class="form-control" placeholder="Enter total price" required>
                            </div>
                            
                            <div class="form-group">
                              <label>Period of Agreement</label>
                                <div class="input-group">
                                  <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                  </div>
                                  <!-- textfield which contains the date range  -->
                                  <input type="text" name="agreement_period" class="form-control" id="reservation" required>
                                </div>
                            </div>

                            <div class="form-group">
                              <!--  textfield for signage area where value are entered-->
                              <label>Signage Area</label>
                              <input type="text" name="signage_area" class="form-control" placeholder="Enter signage area" required>
                            </div>

                            <!-- file area to insert the image  -->
                            <div class="form-group">
                                <label for="exampleInputFile">Signage</label>
                                <input type="file" name="photo" required>
                            </div>

                          <div class="form-group">
                            <!--  textfield for note where value are entered-->
                            <label>Special Note</label>
                            <input type="text" name="note" class="form-control" placeholder="Enter special note" required>
                          </div>

                          <div class="form-group">
                            <!-- checkbox for customer agreement -->
                              <label><input type="checkbox" name="agreement" class="form-control" value="Yes" required> Agrees to terms and condition </label>
                            </div>
                      

                          <div class="form-group">
                              <label>Agreement Signed Name</label>
                            <!--  textfield for agreement signed name where value are entered-->
                              <input type="text" name="signed_name" class="form-control" placeholder="Enter signed name" required>
                          </div>

                            <div class="form-group">
                              <label>Agreement Signed Date</label>
                                <div class="input-group">
                                  <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                  </div>
                                  <!-- textfield which contains date format -->
                                  <input type="Date" name="signed_date" class="form-control"required>
                                </div>
                          </div>

                          <center><h4>Office Use Only</h4></center>

                           <div class="form-group">
                            <!--  textfield for payment details where value are entered-->
                              <label>Payment Details</label>
                              <input type="text" name="payment" class="form-control" placeholder="Enter payment details" required>
                          </div>

                          <div class="form-group">
                              <label>Payment Received</label> 
                             <!--  radio buttons which contains yes or no value -->
                                <div  class="radio">
                                <!-- radio button for yes value is checked at the beginning -->
                                  <label><input type="radio" name="payment_received" id="optradio" value="Yes" checked> Yes</label>
                                  <label><input type="radio" name="payment_received" id="optradio1" value="No"> No</label>
                                </div>
                          </div> 

                          <div class="form-group">
                              <label>Review Date</label>
                                <div class="input-group">
                                  <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                  </div>
                                  <!-- textfield which contains date format -->
                                  <input type="Date" name="review_date" class="form-control" required>
                                </div>
                          </div>

                          <div class="form-group">
                            <!--  textfield for signage name where value are entered-->
                            <label>Signed Name</label>
                            <input type="text" name="signed" class="form-control" placeholder="Enter name"required>
                          </div>

                            <div class="box-footer">
                            <!-- submit button submits the form  -->
                            <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
                          </div>
                    </form>
                </div>
            </div>
        </div>      
        </section>    
</aside>
