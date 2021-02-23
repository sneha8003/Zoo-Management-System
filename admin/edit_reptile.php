<?php
ob_start();//output buffering is started
include '../connection/connection.php';
include 'admin_header.php';// includes header 
include 'admin_sidebar.php';// includes sidebar

//updates the entered new value and sets at the particular textfield of the database
if (isset($_POST['edit'])) {
    $edit_reptile = $connection->prepare("UPDATE reptile SET species=:species, category=:category, name=:name, photo=:photo, date_of_birth=:date_of_birth, location=:location, captivity_wild=:captivity_wild, date_joined=:date_joined, dimension=:dimension, average_dimension=:average_dimension, life=:life, dietary=:dietary, habitat=:habitat, note=:note, reptile_reproduction_type=:reptile_reproduction_type, reptile_average_offspring=:reptile_average_offspring ,reptile_clutch_size=:reptile_clutch_size WHERE id = :id");

//stores the new value in the particular textfields 
    $reptiles=[
        'id'=>$_POST['id'],
        'species'=>$_POST['new_species'],
        'category'=>$_POST['new_category'],
        'name'=>$_POST['new_name'],
        'photo'=>$_FILES['new_photo']['name'],
        'date_of_birth'=>$_POST['new_date_of_birth'],
        'location'=>$_POST['new_location'],
        'captivity_wild'=>$_POST['new_captivity_wild'],
        'date_joined'=>$_POST['new_date_joined'],
        'dimension'=>$_POST['new_dimension'],
        'average_dimension'=>$_POST['new_average_dimension'],
        'life'=>$_POST['new_life'],
        'dietary'=>$_POST['new_dietary'],
        'habitat'=>$_POST['new_habitat'],
        'note'=>$_POST['new_note'],
        'reptile_reproduction_type'=>$_POST['new_reproduction_type'],
        'reptile_average_offspring'=>$_POST['new_average_offspring'],
        'reptile_clutch_size'=>$_POST['new_clutch_size']
    ];
    //executes the records and directs to the page where reptiles are displayed
    $edit_reptile->execute($reptiles);
    header('location:view_reptile.php');
}
if (isset($_GET['id'])) {
    //selects the previous entered record of reptile from the reptile table
    $edit_reptile = $connection->prepare("SELECT * FROM reptile WHERE id = :id");
    //the records are retrieved 
    $edit_reptile->execute($_GET);
    //the records are stored in the variable
    $reptiles = $edit_reptile->fetch();
}
ob_flush();//output buffering is stopped
?>
            <aside class="right-side">
                <section class="content-header">
                    <h1>
                        Edit Reptile
                    </h1>
                    <!-- displays the path in which page the admin lands-->
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
                        <li class="active">Animals</li>
                        <li class="active">View Reptile</li>
                        <li class="active">Edit Reptile</li>
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
                                        <!-- id of the reptile are retrieved from the database and is kept hidden -->
                                            <input type="hidden" name="id" class="form-control" id="name" value ="<?php echo $_GET['id']?>">
                                        </div>

                                        <div class="form-group">
                                            <label>Species</label>
                                        <!-- previous stored species is retrieved in the textbox and data in the textbox are able to replace with new value-->
                                            <input type="text" name="new_species" class="form-control" value="<?php echo $reptiles['species']?>"required>
                                        </div>

                                          <div class="form-group">
                                            <label>Category</label>
                                         <!-- previous stored category name is retrieved in the textbox and data in the textbox are able to replace with new value-->
                                            <input type="text" name="new_category" class="form-control" value="<?php echo $reptiles['category']?>"required>
                                        </div>

                                        <div class="form-group">
                                            <label>Name</label>
                                        <!-- previous stored name is retrieved in the textbox and data in the textbox are able to replace with new value-->
                                            <input type="text" name="new_name" class="form-control" value="<?php echo $reptiles['name']?>"required>
                                        </div>

                                        <!-- displays the previous inserted image -->
                                        <div class="form-group">
                                        <?php
                                        if (file_exists('../img/')) {
                                        echo '<img style="width: 150px; height:100px;" src="../img/'.$reptiles['photo'].'">';
                                        }
                                        ?>
                                        </div>

                                          <!-- the file form which replace with the new image -->
                                        <div class="form-group">
                                            <label for="exampleInputFile">Animal Photo</label>
                                            <input type="file" name="new_photo"required>
                                        </div>

                                        <div class="form-group">
                                        <label>Date of Birth</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <!-- previous stored date of birth is retrieved in the textbox and data in the textbox are able to replace with new value-->
                                            <input type="Date" name="new_date_of_birth" class="form-control" value="<?php echo $reptiles['date_of_birth']?>"required>
                                        </div>
                                     </div>

                                        <div class="form-group">
                                            <label>Location</label>
                                         <!-- previous stored location is retrieved in the textbox and data in the textbox are able to replace with new value-->
                                            <input type="text" name="new_location" class="form-control" value="<?php echo $reptiles['location']?>"required>
                                        </div>

                                        <div class="form-group"> 
                                            <div  class="radio">
                                                <label>
                                                <!-- previous stored value is retrieved in the radio button and are able to replace with new value-->
                                                    <input name="new_captivity_wild" type="radio" value="Captivity" id="optradio" <?php if($reptiles['captivity_wild']=='Captivity') {echo 'checked';} ?> checked>
                                                    Captivity
                                                </label>
                                                <label>
                                                    <input name="new_captivity_wild" type="radio" value="Wild" id="optradio1" <?php if($reptiles['captivity_wild']=='Wild') {echo 'checked';}?>>
                                                    Wild
                                                </label>
                                            </div>
                                        </div> 

                                        <div class="form-group">
                                        <label>Date Joined</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <!-- previous stored date joined is retrieved in the textbox and data in the textbox are able to replace with new value-->
                                            <input type="Date" name="new_date_joined" class="form-control" value="<?php echo $reptiles['date_joined']?>"required>
                                        </div>
                                     </div>

                                         <div class="form-group">
                                            <label>Dimension</label>
                                         <!-- previous stored dimension is retrieved in the textbox and data in the textbox are able to replace with new value-->
                                            <input type="text" name="new_dimension" class="form-control" value="<?php echo $reptiles['dimension']?>"required>
                                        </div>

                                         <div class="form-group">
                                            <label>Average Dimension</label>
                                            <!-- previous stored average dimension is retrieved in the textbox and data in the textbox are able to replace with new value-->
                                            <input type="text" name="new_average_dimension" class="form-control" id="email" value="<?php echo $reptiles['average_dimension']?>"required>
                                        </div>

                                         <div class="form-group">
                                            <label>Life Span</label>
                                            <!-- previous stored life span is retrieved in the textbox and data in the textbox are able to replace with new value-->
                                            <input type="text" name="new_life" class="form-control" value="<?php echo $reptiles['life']?>"required>
                                        </div>

                                         <div class="form-group">
                                            <label>Dietary</label>
                                            <!-- previous stored dietary is retrieved in the textbox and data in the textbox are able to replace with new value-->
                                            <input type="text" name="new_dietary" class="form-control" value="<?php echo $reptiles['dietary']?>"required>
                                        </div>

                                         <div class="form-group">
                                            <label>Habitat</label>
                                        <!-- previous stored habitat is retrieved in the textbox and data in the textbox are able to replace with new value-->
                                            <input type="text" name="new_habitat" class="form-control" value="<?php echo $reptiles['habitat']?>"required>
                                        </div>

                                        <div class="form-group">
                                            <label>Notes</label>
                                        <!-- previous stored note is retrieved in the textbox and data in the textbox are able to replace with new value-->
                                            <input type="text" name="new_note" class="form-control" value="<?php echo $reptiles['note']?>"required>
                                        </div>

                                         <div class="form-group">
                                            <label>Reproduction Type</label>
                                        <!-- previous stored reproduction type is retrieved in the textbox and data in the textbox are able to replace with new value-->
                                            <input type="text" name="new_reproduction_type" class="form-control" value="<?php echo $reptiles['reptile_reproduction_type']?>"required>
                                        </div>

                                         <div class="form-group">
                                            <label>Average Number of Offspring</label>
                                        <!-- previous stored average number of offspring is retrieved in the textbox and data in the textbox are able to replace with new value-->
                                            <input type="text" name="new_average_offspring" class="form-control" value="<?php echo $reptiles['reptile_average_offspring']?>"required>
                                        </div>

                                         <div class="form-group">
                                            <label>Average Clutch Size</label>
                                        <!-- previous stored average clutch size is retrieved in the textbox and data in the textbox are able to replace with new value-->
                                            <input type="text" name="new_clutch_size" class="form-control" value="<?php echo $reptiles['reptile_clutch_size']?>"required>
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

