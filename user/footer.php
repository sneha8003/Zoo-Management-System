<?php
include '../connection/connection.php';//connection to the database

//contaiins null value to the variables
$error_alert='';
$success_alert='';

//when the form is submitted
if (isset($_POST['submit'])){
   // feedback by the users are inserted into feedback table of the databae
   $feedback_table=$connection->prepare("INSERT INTO feedback(name,message) VALUES (:name,:message)");

    // entered value are stored at the particular textfield
     $feedback=[
     'name'=>$_POST['name'],
     'message'=>$_POST['message'],
      ];

    // when all the textfield of the form are submitted then the success message are stored in the variable
    if($feedback_table->execute($feedback)){
      $success_alert='Inserted Successfully!!';
    }
    else
    // when all the textfield of the form are not submitted then the error message are stored in the variable
    $error_alert="Not Inserted!!";
}
?>
<br>
<div class="container-fluid container5">
  <div class="footer">
    <!-- links of the social medias -->
    <div class="col-md-4">
     <a href="https://www.facebook.com/"><i class="fa fa-facebook-square" style="font-size:30px; color: #3B5998;"></i></a>
     <a href="https://www.instagram.com/"><i class="fa fa-instagram" style="font-size:30px; color: e4405f;"></i></a>
     <a href="https://twitter.com/hashtag/twittwe?lang=en"><i class="fa fa-twitter" style="font-size:30px; color:  #00acee;"></i></a>
  </div>

  <div class="col-md-5">
    <div>
    <!-- address of the zoo -->
    <span class="glyphicon glyphicon-home"></span> 45 Zoo Lane, Eastlands, North Yorkshire, YR12 3TH,UK
    </div>
    <br> 
    <div>
    <!-- opening and closing time of the zoo -->
    <span class="glyphicon glyphicon-time"></span> (BST) 10-8pm (other)12-6pm
    </div>
    <br>
  </div>

  <div class="col-md-3">
    <?php
    //displays success and error message in the alert box
    if($error_alert != '') {
    echo "<script>alert('".$error_alert."')</script>";
    }
    elseif($success_alert != '') {
    echo "<script>alert('".$success_alert."')</script>";
    }
    ?>

    <form role="form" method="POST">
        <div class="box-body">
          <div class="form-group">
            <!-- textfield where user writes their name -->
            <input type="text" name="name" class="form-control" placeholder="Enter name" required>
          </div>

          <div class="form-group">
          <!-- textfield where users writes the feedback -->
          <textarea class="form-control" rows="3" cols="42" name="message" placeholder="Enter message" required></textarea>
          </div>
 
          <div class="box-footer">
          <!-- submits the form -->
          <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
          </div>
        </div>
    </form>
  </div>
  </div>
</div>
