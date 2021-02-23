<?php
ob_start();//output buffering is started
include '../connection/connection.php';
include 'admin_header.php';// includes header 
include 'admin_sidebar.php';// includes sidebar

//updates the entered new value and sets at the particular textfield of the database
if (isset($_POST['edit'])) {
    $edit_fish = $connection->prepare("UPDATE fish SET species=:species, name=:name, photo=:photo, date_of_birth=:date_of_birth, location=:location, captivity_wild=:captivity_wild, date_joined=:date_joined, dimension=:dimension, average_dimension=:average_dimension, life=:life, dietary=:dietary, habitat=:habitat, note=:note, fish_average_temperature=:fish_average_temperature, fish_water_type=:fish_water_type ,fish_colour=:fish_colour WHERE id = :id");

    //stores the new value in the particular textfields 
    $fish=[
        'id'=>$_POST['id'],
        'species'=>$_POST['new_species'],
        'name'=>$_POST['new_name'],
        'photo'=>$_FILES['new_photo']['name'],
        'date_of_birth'=>$_POST['new_date_of_birth'],
        'location'=>$_POST['new_location'],
        'captivity_wild'=>$_POST['new_captivity_wild'],
        'date_joined'=>$_POST['new_date_joined'],
        'dimension'=>$_POST['new_dimension'],
        'average_dimension'=>$_POST['new_avergae_dimension'],
        'life'=>$_POST['new_life'],
        'dietary'=>$_POST['new_dietary'],
        'habitat'=>$_POST['new_habitat'],
        'note'=>$_POST['new_note'],
        'fish_average_temperature'=>$_POST['new_avergae_temperature'],
        'fish_water_type'=>$_POST['new_water_type'],
        'fish_colour'=>$_POST['new_fish_colour']
    ];
    //executes the records and directs to the page where fish are displayed
    $edit_fish->execute($fish);
    header('location:view_fish.php');
}
if (isset($_GET['id'])) {
    //selects the previous entered record of fish from the fish table
    $edit_fish = $connection->prepare("SELECT * FROM fish WHERE id = :id");
    //the records are retrieved 
    $edit_fish->execute($_GET);
    //the records are stored in the variable
    $fish = $edit_fish->fetch();
}
ob_flush();//output buffering is stopped
?>
            <aside class="right-side">
                <section class="content-header">
                    <h1>
                        Edit Fish
                    </h1>
                    <!-- displays the path in which page the admin lands-->
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
                        <li class="active">Animals</li>
                        <li class="active">View Fish</li>
                        <li class="active">Edit Fish</li>
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
                                        <!-- id of the fish are retrieved from the database and is kept hidden -->
                                            <input type="hidden" name="id" class="form-control" id="name" value ="<?php echo $_GET['id']?>">
                                        </div>

                                        <div class="form-group">
                                            <label>Species</label>
                                         <!-- previous stored species is retrieved in the textbox and data in the textbox are able to replace with new value-->
                                            <input type="text" name="new_species" class="form-control" value="<?php echo $fish['species']?>"required>
                                        </div>

                                          <div class="form-group">
                                            <label>Category</label>
                                        <!-- previous stored category name is retrieved in the textbox and data in the textbox are able to replace with new value-->
                                            <input type="text" name="new_category" class="form-control" value="<?php echo $fish['category']?>"required>
                                        </div>

                                        <div class="form-group">
                                            <label>Name</label>
                                        <!-- previous stored name is retrieved in the textbox and data in the textbox are able to replace with new value-->
                                            <input type="text" name="new_name" class="form-control" value="<?php echo $fish['name']?>"required>
                                        </div>

                                        <!-- displays the previous inserted image -->
                                        <div class="form-group">
                                        <?php
                                        if (file_exists('../img/')) {
                                        echo '<img style="width: 150px; height:100px;" src="../img/'.$fish['photo'].'">';
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
                                            <input type="Date" name="new_date_of_birth" class="form-control" value="<?php echo $fish['date_of_birth']?>"required>
                                        </div>
                                     </div>

                                        <div class="form-group">
                                            <label>Location</label>
                                        <!-- previous stored location is retrieved in the textbox and data in the textbox are able to replace with new value-->
                                            <input type="text" name="new_location" class="form-control" value="<?php echo $fish['location']?>"required>
                                        </div>

                                        <div class="form-group"> 
                                            <div  class="radio">
                                                <label>
                                                <!-- previous stored value is retrieved in the radio button and are able to replace with new value-->
                                                    <input name="new_captivity_wild" type="radio" value="Captivity" id="optradio" <?php if($fish['captivity_wild']=='Captivity') {echo 'checked';} ?> checked>
                                                    Captivity
                                                </label>
                                                <label>
                                                    <input name="new_captivity_wild" type="radio" value="Wild" id="optradio1" <?php if($fish['captivity_wild']=='Wild') {echo 'checked';}?>>
                                                    Wild
                                                </label>
                                            </div>
                                        </div> 

                                        <div class="form-group">
                                        <label>Date Joined</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <!-- icon of calendar -->
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <!-- previous stored date joined is retrieved in the textbox and data in the textbox are able to replace with new value-->
                                            <input type="Date" name="new_date_joined" class="form-control" value="<?php echo $fish['date_joined']?>"required>
                                        </div>
                                     </div>

                                         <div class="form-group">
                                            <label>Dimension</label>
                                        <!-- previous stored dimension is retrieved in the textbox and data in the textbox are able to replace with new value-->
                                            <input type="text" name="new_dimension" class="form-control" value="<?php echo $fish['dimension']?>"required>
                                        </div>

                                         <div class="form-group">
                                            <label>Average Dimension</label>
                                        <!-- previous stored average dimension is retrieved in the textbox and data in the textbox are able to replace with new value-->
                                            <input type="text" name="new_avergae_dimension" class="form-control" id="email" value="<?php echo $fish['average_dimension']?>"required>
                                        </div>

                                         <div class="form-group">
                                            <label>Life Span</label>
                                        <!-- previous stored life span is retrieved in the textbox and data in the textbox are able to replace with new value-->
                                            <input type="text" name="new_life" class="form-control" value="<?php echo $fish['life']?>"required>
                                        </div>

                                         <div class="form-group">
                                            <label>Dietary</label>
                                        <!-- previous stored dietary is retrieved in the textbox and data in the textbox are able to replace with new value-->
                                            <input type="text" name="new_dietary" class="form-control" value="<?php echo $fish['dietary']?>"required>
                                        </div>

                                         <div class="form-group">
                                            <label>Habitat</label>
                                        <!-- previous stored habitat is retrieved in the textbox and data in the textbox are able to replace with new value-->
                                            <input type="text" name="new_habitat" class="form-control" value="<?php echo $fish['habitat']?>"required>
                                        </div>

                                         <div class="form-group">
                                            <label>Notes</label>
                                        <!-- previous stored note is retrieved in the textbox and data in the textbox are able to replace with new value-->
                                            <input type="text" name="new_note" class="form-control" value="<?php echo $fish['note']?>"required>
                                        </div>

                                         <div class="form-group">
                                            <label>Average Body Temperature</label>
                                        <!-- previous stored average body temperature is retrieved in the textbox and data in the textbox are able to replace with new value-->
                                            <input type="text" name="new_avergae_temperature" class="form-control" value="<?php echo $fish['fish_average_temperature']?>"required>
                                        </div>

                                         <div class="form-group">
                                            <label>Water Type</label>
                                        <!-- previous stored water type is retrieved in the textbox and data in the textbox are able to replace with new value-->
                                            <input type="text" name="new_water_type" class="form-control" value="<?php echo $fish['fish_water_type']?>"required>
                                        </div>

                                         <div class="form-group">
                                            <label>Colour Variants</label>
                                        <!-- previous stored colour variants is retrieved in the textbox and data in the textbox are able to replace with new value-->
                                            <input type="text" name="new_fish_colour" class="form-control" value="<?php echo $fish['fish_colour']?>"required>
                                        </div>

                                     <!-- submits the form and updates records -->
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