<?php
ob_start();//output buffering is started
include '../connection/connection.php';
include 'admin_header.php';// includes header 
include 'admin_sidebar.php';// includes sidebar

if (isset($_POST['edit'])) {
    //updates the entered new value and sets at the particular textfield of the database
    $edit_sponsors = $connection->prepare("UPDATE sponsor SET name=:name,  existing_customer=:existing_customer, id=:id, primary_telephone=:primary_telephone, secondary_telephone=:secondary_telephone, address=:address, sponsored_animal=:sponsored_animal, location=:location,  sponsorship_band=:sponsorship_band, price=:price, agreement_period=:agreement_period, signage_area=:signage_area, photo=:photo, note=:note, signed_name=:signed_name, signed_date=:signed_date,payment=:payment, payment_received=:payment_received, review_date=:review_date, signed=:signed WHERE sponsor_id = :sponsor_id");

    //stores the new value in the particular textfields 
    $sponsors=[
        'sponsor_id'=>$_POST['sponsor_id'],
        'name'=>$_POST['new_name'],
        'existing_customer'=>$_POST['new_existing_customer'],
        'id'=>$_POST['new_id'],
        'primary_telephone'=>$_POST['new_primary_telephone'],
        'secondary_telephone'=>$_POST['new_secondary_telephone'],
        'address'=>$_POST['new_address'],
        'sponsored_animal'=>$_POST['new_sponsored_animal'],
        'location'=>$_POST['new_location'],
        'sponsorship_band'=>$_POST['new_sponsorship_band'],
        'price'=>$_POST['new_price'],
        'agreement_period'=>$_POST['new_agreement_period'],
        'signage_area'=>$_POST['new_signage_area'],
        'photo'=>$_FILES['new_photo']['name'],
        'note'=>$_POST['new_note'],
        'signed_name'=>$_POST['new_signed_name'],
        'signed_date'=>$_POST['new_signed_date'],
        'payment'=>$_POST['new_payment'],
        'payment_received'=>$_POST['new_payment_received'],
        'review_date'=>$_POST['new_review_date'],
        'signed'=>$_POST['new_signed']

    ];
    //executes the records and directs to the page where sponsors are displayed
    $edit_sponsors->execute($sponsors);
    header('location:view_sponsors.php');
}
if (isset($_GET['sponsor_id'])) {
    //selects the previous entered record of zookeeper from the register table
    $edit_sponsors = $connection->prepare("SELECT * FROM sponsor WHERE sponsor_id = :sponsor_id");
    //the records are retrieved 
    $edit_sponsors->execute($_GET);
    //the records are stored in the variable
    $sponsors =$edit_sponsors->fetch();
}
ob_flush();
?>
          
<aside class="right-side">
    <section class="content-header">
    <h1>
    Edit Sponsors
    </h1>
    <!-- displays the path in which page the admin lands-->
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Users</li>
        <li class="active">View Users</li>
        <li class="active">Edit Users</li>
    </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <!-- without the value in every fields the record doesnot gets submitted because of the validation-->
                    <form role="form" method="POST" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group">
                            <!-- id of the sponsors are retrieved from the database and is kept hidden -->
                                <input type="hidden" name="sponsor_id" class="form-control" value ="<?php echo $_GET['sponsor_id']?>">
                            </div>

                            <div class="form-group">
                            <!-- previous stored company name is retrieved in the textbox and data in the textbox are able to replace with new value-->
                            <label>Client or Company Name</label>
                            <input type="text" name="new_name" class="form-control" placeholder="Enter company name" value="<?php echo $sponsors['name']?>" required>
                            </div>

                            <div class="form-group">
                            <label for="name">Existing Customer</label> 
                                <div  class="radio">
                                <!-- previous stored value is retrieved in the radio button and are able to replace with new value-->
                                <label><input name="new_existing_customer" type="radio" value="Yes" <?php if($sponsors['existing_customer']=='Yes') {echo 'checked';}?>> Yes</label>
                                <label><input name="new_existing_customer" type="radio" value="No" <?php if($sponsors['existing_customer']=='No') {echo 'checked';}?>> No</label>

                                </div>
                            </div> 

                            <div class="form-group">
                            <!-- previous stored id is retrieved in the textbox and data in the textbox are able to replace with new value-->
                            <label>ID</label>
                            <input type="text" name="new_id" class="form-control" placeholder="Enter id" value="<?php echo $sponsors['id']?>" required>
                            </div>

                            <div class="form-group">
                                <label>Primary Telephone Number</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-phone"></i>
                                        </div>
                                        <!-- previous stored primary telephone number is retrieved in the textbox and data in the textbox are able to replace with new value where maximum digits of phone number is 10-->
                                        <input type="text" name="new_primary_telephone" value="<?php echo $sponsors['primary_telephone']?>" maxlength="10" class="form-control" placeholder="Enter primary telephone number" required>
                                    </div>
                            </div>

                            <div class="form-group">
                                        <label>Secondary Telephone Number</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-phone"></i>
                                            </div>
                                            <!-- previous stored secondary telephone number is retrieved in the textbox and data in the textbox are able to replace with new value where maximum digits of phone number is 10-->
                                           <input type="text" name="new_secondary_telephone"  maxlength="10" class="form-control" placeholder="Enter secondary telephone number" value="<?php echo $sponsors['secondary_telephone']?>"required>
                                        </div>
                            </div>

                             <div class="form-group">
                            <!-- previous stored address is retrieved in the textbox and data in the textbox are able to replace with new value-->
                            <label>Address</label>
                            <input type="text" name="new_address" class="form-control" placeholder="Enter address" value="<?php echo $sponsors['address']?>"required>
                            </div>

                            <div class="form-group">
                            <!-- previous stored sponsored animal is retrieved in the textbox and data in the textbox are able to replace with new value-->
                            <label>Sponsored Animal</label>
                            <input type="text" name="new_sponsored_animal" class="form-control" placeholder="Enter sponsored animal" value="<?php echo $sponsors['sponsored_animal']?>"required>
                            </div>

                            <div class="form-group">
                            <!-- previous stored animal location is retrieved in the textbox and data in the textbox are able to replace with new value-->
                            <label>Animal Location</label>
                            <input type="text" name="new_location" class="form-control" placeholder="Enter animal location" value="<?php echo $sponsors['location']?>"required>
                            </div>

                            <div class="form-group">
                            <!-- previous stored sponsorship band is retrieved in the textbox and data in the textbox are able to replace with new value-->
                            <label>Sponsorship Band</label>
                            <input type="text" name="new_sponsorship_band" class="form-control" placeholder="Enter Sponsorship band" value="<?php echo $sponsors['sponsorship_band']?>"required>
                            </div>

                            <div class="form-group">
                            <!-- previous stored price is retrieved in the textbox and data in the textbox are able to replace with new value-->
                            <label>Total Price</label>
                            <input type="text" name="new_price" class="form-control" placeholder="Enter total price" value="<?php echo $sponsors['price']?>"required>
                            </div>

                            <!-- previous stored agreementperiod is retrieved in the textbox and data in the textbox are able to replace with new value-->
                             <div class="form-group">
                                        <label>Agreement Period</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" name="new_agreement_period" class="form-control" id= "reservation" value="<?php echo $sponsors['agreement_period']?>"required>
                                        </div>
                            </div>
                             

                            <div class="form-group">
                            <!-- previous stored signage area is retrieved in the textbox and data in the textbox are able to replace with new value-->
                            <label>Signage Area</label>
                            <input type="text" name="new_signage_area" class="form-control" placeholder="Enter signage area" value="<?php echo $sponsors['signage_area']?>"required>
                            </div>

                             <div class="form-group">
                            <!-- previous stored note is retrieved in the textbox and data in the textbox are able to replace with new value-->
                            <label>Special Note</label>
                            <br>
                             <input type="text" name="new_note" class="form-control" placeholder="Enter note" value="<?php echo $sponsors['note']?>"required> 
                            </div>

                            <!-- displays the previous inserted image -->
                            <div class="form-group">
                            <?php
                            if (file_exists('../img/')) {
                            echo '<img style="width: 150px; height:100px;" src="../img/'.$sponsors['photo'].'">';
                            }
                            ?>
                            </div>

                             <!-- the file form which replace with the new image -->
                            <div class="form-group">
                                <label for="exampleInputFile">Signage</label>
                                <input type="file" name="new_photo"required>
                            </div>

                            <!-- checkbox for the customer agreement -->
                            <div class="form-group">
                            <label><input type="checkbox" value="Yes" <?php if($sponsors['agreement']=='Yes') {echo 'checked';}?> checked> Agrees to terms and conditions</label>
                            </div>

                             <!-- previous stored data is retrieved in the textbox and are able to replace with new value-->
                            <div class="form-group">
                              <label>Agreement Signed Name</label>
                              <input type="text" name="new_signed_name" class="form-control" value="<?php echo $sponsors['signed_name']?>" placeholder="Enter agreement signed name"required>
                          </div>

                            <!-- previous stored data is retrieved in the textbox and are able to replace with new value-->
                            <div class="form-group">
                              <label>Agreement Signed Date</label>
                                <div class="input-group">
                                  <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                  </div>
                                  <!-- textfield which contains date format -->
                                  <input type="Date" name="new_signed_date" class="form-control" value="<?php echo $sponsors['signed_date']?>"required>
                                </div>
                          </div>

                            <center><h4>Office Use Only</h4></center>

                             <div class="form-group">
                            <!-- previous stored payment details is retrieved in the textbox and data in the textbox are able to replace with new value-->
                            <label>Payment Details</label>
                            <input type="text" name="new_payment" class="form-control" placeholder="Enter payment details" value="<?php echo $sponsors['payment']?>"required>
                            </div>

                            <div class="form-group">
                                <label for="name">Payment Received</label> 
                                    <div  class="radio">
                                     <!-- previous stored value is retrieved in the radio button and are able to replace with new value-->
                                    <label><input name="new_payment_received" type="radio" value="Yes" <?php if($sponsors['payment_received']=='Yes') {echo 'checked';}?> checked> Yes </label>
                                    <label><input name="new_payment_received" type="radio" value="No" <?php if($sponsors['payment_received']=='No') {echo 'checked';}?> checked> No</label>
                                    </div>
                            </div> 

                             <div class="form-group">
                                        <label>Review Date</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <!-- previous stored review date is retrieved in the textbox and data in the textbox are able to replace with new value-->
                                            <input type="Date" name="new_review_date" class="form-control" value="<?php echo $sponsors['review_date']?>"required>
                                        </div>
                                </div>

                            <div class="form-group">
                            <!-- previous stored signed name is retrieved in the textbox and data in the textbox are able to replace with new value-->
                            <label for="signed">Signed Name</label>
                            <input type="text" name="new_signed" class="form-control" placeholder="Enter name" value="<?php echo $sponsors['signed']?>"required>
                            </div>

                             <div class="box-footer">
                            <!-- submits the form -->
                                <button type="submit" name="edit" value="edit" class="btn btn-primary">Submit</button>
                            </div> 
                                    
                                </div>                     
                                </form>
                            </div>
                        </div>
                    </div> 
                </section>
            </aside>
