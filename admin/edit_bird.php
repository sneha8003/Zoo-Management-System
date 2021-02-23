<?php
ob_start();//output buffering is started
include '../connection/connection.php';
include 'admin_header.php';// includes header 
include 'admin_sidebar.php';// includes sidebar

//updates the entered new value and sets at the particular textfield of the database
if (isset($_POST['edit'])) {
    $edit_bird = $connection->prepare("UPDATE bird SET species=:species, category=:category, name=:name,  photo=:photo, date_of_birth=:date_of_birth, location=:location, captivity_wild=:captivity_wild, date_joined=:date_joined, dimension=:dimension, average_dimension=:average_dimension, life=:life, dietary=:dietary, habitat=:habitat, note=:note, bird_net_construction=:bird_net_construction, bird_clutch=:bird_clutch, bird_wing_span=:bird_wing_span, bird_ability_fly=:bird_ability_fly, bird_plumage=:bird_plumage WHERE id = :id");

    //stores the new value in the particular textfields 
    $birds=[
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
        'average_dimension'=>$_POST['new_avergae_dimension'],
        'life'=>$_POST['new_life'],
        'dietary'=>$_POST['new_dietary'],
        'habitat'=>$_POST['new_habitat'],
        'note'=>$_POST['new_note'],
        'bird_net_construction'=>$_POST['new_new_construction'],
        'bird_clutch'=>$_POST['new_bird_clutch'],
        'bird_wing_span'=>$_POST['new_wing_span'],
        'bird_ability_fly'=>$_POST['new_ability_fly'],
        'bird_plumage'=>$_POST['new_bird_plumage']
    ];
    //executes the records and directs to the page where birds are displayed
    $edit_bird->execute($birds);
    header('location:view_bird.php');
}
if (isset($_GET['id'])) {
    //selects the previous entered record of bird from the bird table
    $edit_bird = $connection->prepare("SELECT * FROM bird WHERE id = :id");
    //the records are retrieved 
    $edit_bird->execute($_GET);
    //the records are stored in the variable
    $birds = $edit_bird->fetch();
}
ob_flush();//output buffering is stopped
?>
            <aside class="right-side">
                <section class="content-header">
                    <h1>
                        Edit Bird
                    </h1>
                    <!-- displays the path in which page the admin lands-->
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
                        <li class="active">Birds</li>
                        <li class="active">View Bird</li>
                        <li class="active">Edit bird</li>
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
                                            <!-- id of the bird are retrieved from the database and is kept hidden -->
                                            <input type="hidden" name="id" class="form-control" id="name" value ="<?php echo $_GET['id']?>">
                                        </div>

                                        <div class="form-group">
                                            <label>Species</label>
                                         <!-- previous stored species is retrieved in the textbox and data in the textbox are able to replace with new value-->
                                            <input type="text" name="new_species" class="form-control" value="<?php echo $birds['species']?>" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Category</label>
                                         <!-- previous stored category name is retrieved in the textbox and data in the textbox are able to replace with new value-->
                                            <input type="text" name="new_category" class="form-control" value="<?php echo $birds['category']?>" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Name</label>
                                         <!-- previous stored name is retrieved in the textbox and data in the textbox are able to replace with new value-->
                                            <input type="text" name="new_name" class="form-control" value="<?php echo $birds['name']?>" required>
                                        </div>

                                         <!-- displays the previous inserted image -->
                                        <div class="form-group">
                                        <?php
                                        if (file_exists('../img/')) {
                                        echo '<img style="width: 150px; height:100px;" src="../img/'.$birds['photo'].'">';
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
                                            <input type="Date" name="new_date_of_birth" class="form-control" value="<?php echo $birds['date_of_birth']?>"required>
                                        </div>
                                     </div>

                                        <div class="form-group">
                                            <label>Location</label>
                                        <!-- previous stored location is retrieved in the textbox and data in the textbox are able to replace with new value-->
                                            <input type="text" name="new_location" class="form-control" value="<?php echo $birds['location']?>"required>
                                        </div>

                                        <div class="form-group"> 
                                            <div  class="radio">
                                                <label>
                                                <!-- previous stored value is retrieved in the radio button and are able to replace with new value-->
                                                    <input name="new_captivity_wild" type="radio" value="Captivity" id="optradio" <?php if($birds['captivity_wild']=='Captivity') {echo 'checked';} ?> checked>
                                                    Captivity
                                                </label>
                                                <label>
                                                    <input name="new_captivity_wild" type="radio" value="Wild" id="optradio1" <?php if($birds['captivity_wild']=='Wild') {echo 'checked';}?>>
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
                                            <input type="Date" name="new_date_joined" class="form-control" value="<?php echo $birds['date_joined']?>"required>
                                        </div>
                                     </div>

                                         <div class="form-group">
                                            <label>Dimension</label>
                                        <!-- previous stored dimension is retrieved in the textbox and data in the textbox are able to replace with new value-->
                                            <input type="text" name="new_dimension" class="form-control" value="<?php echo $birds['dimension']?>"required>
                                        </div>

                                         <div class="form-group">
                                            <label>Average Dimension</label>
                                        <!-- previous stored average dimension is retrieved in the textbox and data in the textbox are able to replace with new value-->
                                            <input type="text" name="new_avergae_dimension" class="form-control" id="email" value="<?php echo $birds['average_dimension']?>"required>
                                        </div>

                                         <div class="form-group">
                                            <label>Life Span</label>
                                        <!-- previous stored life span is retrieved in the textbox and data in the textbox are able to replace with new value-->
                                            <input type="text" name="new_life" class="form-control" value="<?php echo $birds['life']?>"required>
                                        </div>

                                         <div class="form-group">
                                            <label>Dietary</label>
                                        <!-- previous stored dietary is retrieved in the textbox and data in the textbox are able to replace with new value-->
                                            <input type="text" name="new_dietary" class="form-control" value="<?php echo $birds['dietary']?>"required>
                                        </div>

                                         <div class="form-group">
                                            <label>Habitat</label>
                                        <!-- previous stored habitat is retrieved in the textbox and data in the textbox are able to replace with new value-->
                                            <input type="text" name="new_habitat" class="form-control" value="<?php echo $birds['habitat']?>"required>
                                        </div>

                                         <div class="form-group">
                                            <label>Notes</label>
                                        <!-- previous stored note is retrieved in the textbox and data in the textbox are able to replace with new value-->
                                            <input type="text" name="new_note" class="form-control" value="<?php echo $birds['note']?>"required>
                                        </div>

                                        <div class="form-group">
                                            <label>Nest Construction Method</label>
                                        <!-- previous stored consruction method is retrieved in the textbox and data in the textbox are able to replace with new value-->
                                            <input type="text" name="new_new_construction" class="form-control" value="<?php echo $birds['bird_net_construction']?>"required>
                                        </div>

                                          <div class="form-group">
                                            <label>Clutch Size</label>
                                        <!-- previous stored clutch size is retrieved in the textbox and data in the textbox are able to replace with new value-->
                                            <input type="text" name="new_bird_clutch" class="form-control" value="<?php echo $birds['bird_clutch']?>"required>
                                        </div>

                                          <div class="form-group">
                                            <label>Wing Span</label>
                                        <!-- previous stored wing span is retrieved in the textbox and data in the textbox are able to replace with new value-->
                                            <input type="text" name="new_wing_span" class="form-control" value="<?php echo $birds['bird_wing_span']?>"required>
                                        </div>

                                        <div class="form-group"> 
                                            <label>Ability to Fly</label>
                                            <div  class="radio">
                                                <!-- previous stored value is retrieved in the radio button and are able to replace with new value-->
                                                <label>
                                                    <input name="new_ability_fly" type="radio" value="Yes" id="optradio" <?php if($birds['bird_ability_fly']=='Yes') {echo 'checked';} ?> checked>
                                                    Yes
                                                </label>
                                                <label>
                                                    <input name="new_ability_fly" type="radio" value="No" id="optradio1" <?php if($birds['bird_ability_fly']=='No') {echo 'checked';}?>>
                                                    No
                                                </label>
                                            </div>
                                        </div> 

                                        <div class="form-group">
                                            <label>Plumage Colour Variants</label>
                                        <!-- previous stored colour variants is retrieved in the textbox and data in the textbox are able to replace with new value-->
                                            <input type="text" name="new_bird_plumage" class="form-control" value="<?php echo $birds['bird_plumage']?>"required>
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