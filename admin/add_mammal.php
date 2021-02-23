<?php
include '../connection/connection.php';//connection to the database
include 'admin_header.php';// includes header 
include 'admin_sidebar.php';// includes sidebar

//consists of null value
$error_alert='';
$success_alert='';

//when the form gets submitted
if (isset($_POST['submit'])){
  // filename and tempname of the photo
   $file=$_FILES["photo"]["name"];
   $temp=$_FILES["photo"]["tmp_name"];
   // photo is selected from the location 
   $path="../img/".$file;
   // the uploaded path of the file is moved
   move_uploaded_file($temp, $path);

    //inserts the entered value of the particular field in the mammal table of the database
   $add_mammal=$connection->prepare("INSERT INTO mammal(species,category,name,photo,date_of_birth,location,captivity_wild,date_joined,dimension,average_dimension,life,dietary,habitat,note,gestational,mammal_category,mammal_colour) VALUES (:species,:category,:name,:photo,:date_of_birth,:location,:captivity_wild,:date_joined,:dimension,:average_dimension,:life,:dietary,:habitat,:note,:gestational,:mammal_category,:mammal_colour)");
     
    //the entered value of the particular fields are stored  
     $mammals=[
     'species'=>$_POST['species'],
     'category'=>$_POST['category'],
     'name'=>$_POST['name'],
     'photo'=>$_FILES['photo']['name'],
     'date_of_birth'=>$_POST['date_of_birth'],
     'location'=>$_POST['location'],
     'captivity_wild'=>$_POST['captivity_wild'],
     'date_joined'=>$_POST['date_joined'],
     'dimension'=>$_POST['dimension'],
     'average_dimension'=>$_POST['average_dimension'],
     'life'=>$_POST['life'],
     'dietary'=>$_POST['dietary'],
     'habitat'=>$_POST['habitat'],
     'note'=>$_POST['note'],
     'gestational'=>$_POST['gestational'],
     'mammal_category'=>$_POST['mammal_category'],
     'mammal_colour'=>$_POST['mammal_colour']
      ];

    //when all the value from the fields are inserted then success message is stored in the variable
    if($add_mammal->execute($mammals)){
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
        Add Mammal
        </h1>
        <!-- displays the path in which page the admin lands-->
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Animals</a></li>
            <li class="active">Add Mammal</li>
        </ol>
    </section>
        <section class="content">
            <div class="row">
                        <!-- displays error message and success message in the alert box -->
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
                    <!-- form for adding the birds where validation are applied to every form-->
                    <form role="form" method="POST" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group">
                            <label>Species</label>
                             <!--  textfield for species  where value are entered-->
                            <input type="text" name="species" class="form-control" placeholder="Enter species" required>
                            </div>

                            <div class="form-group">
                            <label>Category</label>
                             <!--  textfield for category  where value are entered-->
                            <input type="text" name="category" class="form-control" placeholder="Enter category" required>
                            </div>

                            <div class="form-group">
                            <label>Animal Name</label>
                            <!--  textfield for animal name where value are entered-->
                            <input type="text" name="name" class="form-control" placeholder="Enter name"required>
                            </div>

                            <!-- file area to insert the photo of animal  -->
                            <div class="form-group">
                                <label for="exampleInputFile">Animal Photo</label>
                                <input type="file" name="photo"required>
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

                            <div class="form-group">
                            <label>Location</label>
                            <!--  textfield for location where value are entered-->
                            <input type="text" name="location" class="form-control" placeholder="Enter location" required>
                            </div>

                            <div class="form-group"> 
                                <!--  radio button where captivity value is checked at the beginning -->
                                    <div class="radio">
                                    <label><input type="radio" name="captivity_wild" id="optradio" value="Captivity" checked> Captivity</label>
                                    <label><input type="radio" name="captivity_wild" id="optradio1" value="Wild"> Wild</label>
                                    </div>
                            </div>  

                            <div class="form-group">
                                <label>Animal Joined Zoo Date</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <!-- textfield which contains date format -->
                                    <input type="Date" name="date_joined" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group">
                            <label>Dimensions</label>
                            <!--  textfield for dimensions where value are entered-->
                            <input type="text" name="dimension" class="form-control" placeholder="Enter dimension" required>
                            </div>

                             <div class="form-group">
                            <label>Average Dimension</label>
                            <!--  textfield for average dimension where value are entered-->
                            <input type="text" name="average_dimension" class="form-control" placeholder="Enter average dimension" required>
                            </div>

                            <div class="form-group">
                            <label>Life Span</label>
                            <!--  textfield for life span where value are entered-->
                            <input type="text" name="life" class="form-control" placeholder="Enter life span" required>
                            </div>

                            <div class="form-group">
                            <label>Dietary</label>
                            <!--  textfield for dietary where value are entered-->
                            <input type="text" name="dietary" class="form-control" placeholder="Enter dietary" required>
                            </div>

                            <div class="form-group">
                            <label>Habitat</label>
                            <!--  textfield for habitat where value are entered-->
                            <input type="text" name="habitat" class="form-control" placeholder="Enter habitat" required>
                            </div>

                            <div class="form-group">
                            <label>Special Note</label>
                            <!--  textfield for special note where value are entered-->
                            <input type="text" name="note" class="form-control" placeholder="Enter special note" required>
                            </div>

                            <div class="form-group">
                            <label>Gestational Period</label>
                            <!--  textfield for gestational period where value are entered-->
                            <input type="text" name="gestational" class="form-control" placeholder="Enter gestational period" required>
                            </div>

                             <div class="form-group">
                            <label>Mammal Category</label>
                            <!--  textfield for mammal category where value are entered-->
                            <input type="text" name="mammal_category" class="form-control" placeholder="Enter mammal category" required>
                            </div>

                             <div class="form-group">
                            <label>Colour Variants</label>
                            <!--  textfield for colour variants where value are entered-->
                            <input type="text" name="mammal_colour" class="form-control" placeholder="Enter color variants" required>
                            </div>

                            <div class="box-footer">
                            <!-- submits the form -->
                            <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>      
        </section>    
</aside>

