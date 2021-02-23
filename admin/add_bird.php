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

    //inserts the entered value of the particular field in the bird table of the database
   $add_bird=$connection->prepare("INSERT INTO bird(species,category,name,photo,date_of_birth,location,captivity_wild,date_joined,dimension,average_dimension,life,dietary,habitat,note,bird_net_construction,bird_clutch,bird_wing_span,bird_ability_fly,bird_plumage) VALUES (:species,:category,:name,:photo,:date_of_birth,:location,:captivity_wild,:date_joined,:dimension,:average_dimension,:life,:dietary,:habitat,:note,:bird_net_construction,:bird_clutch,:bird_wing_span,:bird_ability_fly,:bird_plumage)");
     
    //the entered value of the particular fields are stored  
     $birds=[
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
     'bird_net_construction'=>$_POST['bird_net_construction'],
     'bird_clutch'=>$_POST['bird_clutch'],
     'bird_wing_span'=>$_POST['bird_wing_span'],
     'bird_ability_fly'=>$_POST['bird_ability_fly'],
     'bird_plumage'=>$_POST['bird_plumage']
      ];

    //when all the value from the fields are inserted then success message is stored in the variable
    if($add_bird->execute($birds)){
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
        Add Bird
        </h1>
         <!-- displays the path in which page the user lands-->
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Animals</a></li>
            <li class="active">Add Bird</li>
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
                            <!--  textfield for animal name where value are entered-->
                            <label>Animal Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter name"required>
                            </div>

                            <!-- file area to insert animal photo -->
                            <div class="form-group">
                                <label for="exampleInputFile">Animal Photo</label>
                                <input type="file" name="photo" required>
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

                            <div class="form-group">
                            <label>Location</label>
                            <!--  textfield for location where value are entered-->
                            <input type="text" name="location" class="form-control" placeholder="Enter location"required>
                            </div>

                            <div class="form-group"> 
                                    <div class="radio">
                                   <!--  radio button where captivity value is checked at the beginning -->
                                    <label><input type="radio" name="captivity_wild" id="optradio" value="Captivity" checked> Captivity</label>
                                     <!-- option value for wild -->
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
                                    <input type="Date" name="date_joined" class="form-control"required>
                                </div>
                            </div>

                            <div class="form-group">
                            <label>Dimensions</label>
                            <!--  textfield for dimensions where value are entered-->
                            <input type="text" name="dimension" class="form-control" placeholder="Enter dimension"required>
                            </div>

                             <div class="form-group">
                            <label>Average Dimension</label>
                            <!--  textfield for average dimension where value are entered-->
                            <input type="text" name="average_dimension" class="form-control" placeholder="Enter average dimension"required>
                            </div>

                            <div class="form-group">
                            <!--  textfield for life span where value are entered-->
                            <label>Life Span</label>
                            <input type="text" name="life" class="form-control" placeholder="Enter life span"required>
                            </div>

                            <div class="form-group">
                            <label>Dietary</label>
                            <!--  textfield for dietary where value are entered-->
                            <input type="text" name="dietary" class="form-control" placeholder="Enter dietary"required>
                            </div>

                            <div class="form-group">
                            <label>Habitat</label>
                            <!--  textfield for habitat where value are entered-->
                            <input type="text" name="habitat" class="form-control" placeholder="Enter habitat"required>
                            </div>

                            <div class="form-group">
                            <label>Special Note</label>
                            <!--  textfield for special note where value are entered-->
                            <input type="text" name="note" class="form-control" placeholder="Enter special note"required>
                            </div>

                            <div class="form-group">
                            <label>Nest Construction Method</label>
                            <!--  textfield for construction method where value are entered-->
                            <input type="text" name="bird_net_construction" class="form-control" placeholder="Enter net construction method"required>
                            </div>

                             <div class="form-group">
                            <labeL>Cluth Size</label>
                            <!--  textfield for clutch size where value are entered-->
                            <input type="text" name="bird_clutch" class="form-control" placeholder="Enter clutch size" required>
                            </div>

                             <div class="form-group">
                            <label>Wing Span</label>
                            <!--  textfield for wing span where value are entered-->
                            <input type="text" name="bird_wing_span" class="form-control" placeholder="Enter wing span" required>
                            </div>

                             <div class="form-group">
                                <label for="period">Ability to Fly</label>
                                <div  class="radio">
                                <!-- radio buttons for yes or no value where yes radio button is checked at the beginning-->
                                <label><input type="radio" name="bird_ability_fly" id="optradio" value="Yes" checked> Yes</label>
                                <label><input type="radio" name="bird_ability_fly" id="optradio1" value="No"> No</label>
                            </div>

                            <div class="form-group">
                            <label>Plumage colour of Variants</label>
                            <!--  textfield for colour variants where value are entered-->
                            <input type="text" name="bird_plumage" class="form-control" placeholder="Enter plumage colour of variants" required>
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
