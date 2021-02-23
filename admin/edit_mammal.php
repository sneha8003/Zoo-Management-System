<?php
ob_start();//output buffering is started
include '../connection/connection.php';
include 'admin_header.php';// includes header 
include 'admin_sidebar.php';// includes sidebar

//updates the entered new value and sets at the particular textfield of the database
if (isset($_POST['edit'])) {
    $file=$_FILES["photo"]["name"];
   $temp=$_FILES["photo"]["tmp_name"];
   // photo is selected from the location 
   $path="../img/".$file;

    $edit_mammal = $connection->prepare("UPDATE mammal SET species=:species, category=:category, name=:name, photo=:photo, date_of_birth=:date_of_birth, location=:location, captivity_wild=:captivity_wild, date_joined=:date_joined, dimension=:dimension, average_dimension=:average_dimension, life=:life, dietary=:dietary, habitat=:habitat, note=:note, gestational=:gestational, mammal_category=:mammal_category ,mammal_colour=:mammal_colour WHERE id = :id");

    //stores the new value in the particular textfields 
    $mammals=[
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
        'gestational'=>$_POST['new_gestational'],
        'mammal_category'=>$_POST['new_mammal_category'],
        'mammal_colour'=>$_POST['new_mammal_colour']
    ];
    //executes the records and directs to the page where mammals are displayed
    $edit_mammal->execute($mammals);
    header('location:view_mammal.php');
}
if (isset($_GET['id'])) {
    //selects the previous entered record of mammal from the mammal table
    $edit_mammal = $connection->prepare("SELECT * FROM mammal WHERE id = :id");
    //the records are retrieved 
    $edit_mammal->execute($_GET);
    //the records are stored in the variable
    $mammals = $edit_mammal->fetch();
}
ob_flush();//output buffering is stopped
?>
            <aside class="right-side">
                <section class="content-header">
                    <h1>
                        Edit Mammal
                    </h1>
                    <!-- displays the path in which page the admin lands-->
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
                        <li class="active">Animals</li>
                        <li class="active">View Mammal</li>
                        <li class="active">Edit Mammal</li>
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
                                        <!-- id of the mammal are retrieved from the database and is kept hidden -->
                                            <input type="hidden" name="id" class="form-control" id="name" value ="<?php echo $_GET['id']?>">
                                        </div>

                                         <div class="form-group">
                                            <label>Species</label>
                                        <!-- previous stored species is retrieved in the textbox and data in the textbox are able to replace with new value-->
                                            <input type="text" name="new_species" class="form-control" value="<?php echo $mammals['species']?>" required>
                                        </div> 

                                        <div class="form-group">
                                            <label>Category</label>
                                        <!-- previous stored category name is retrieved in the textbox and data in the textbox are able to replace with new value-->
                                            <input type="text" name="new_category" class="form-control" value="<?php echo $mammals['category']?>" required>
                                        </div> 

                                        <div class="form-group">
                                            <label>Name</label>
                                        <!-- previous stored name is retrieved in the textbox and data in the textbox are able to replace with new value-->
                                            <input type="text" name="new_name" class="form-control" value="<?php echo $mammals['name']?>" required>
                                        </div>

                                        <!-- displays the previous inserted image -->
                                        <div class="form-group">
                                        <?php
                                        if (file_exists('../img/')) {
                                        echo '<img style="width: 150px; height:100px;" src="../img/'.$mammals['photo'].'">';
                                        }
                                        ?>
                                        </div>

                                        <!-- the file form which replace with the new image -->
                                        <div class="form-group">
                                            <label for="exampleInputFile">Signage</label>
                                            <input type="file" name="new_photo">
                                        </div>

                                        <div class="form-group">
                                        <label>Date of Birth</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                         <!-- previous stored date of birth is retrieved in the textbox and data in the textbox are able to replace with new value-->
                                            <input type="Date" name="new_date_of_birth" class="form-control" value="<?php echo $mammals['date_of_birth']?>" required>
                                        </div>
                                     </div>

                                        <div class="form-group">
                                            <label>Location</label>
                                        <!-- previous stored location is retrieved in the textbox and data in the textbox are able to replace with new value-->
                                            <input type="text" name="new_location" class="form-control" value="<?php echo $mammals['location']?>"required>
                                        </div>

                                        <div class="form-group"> 
                                            <div  class="radio">
                                                <label>
                                                <!-- previous stored value is retrieved in the radio button and are able to replace with new value-->
                                                    <input name="new_captivity_wild" type="radio" value="Captivity" id="optradio" <?php if($mammals['captivity_wild']=='Captivity') {echo 'checked';} ?> checked>
                                                    Captivity
                                                </label>
                                                <label>
                                                    <input name="new_captivity_wild" type="radio" value="Wild" id="optradio1" <?php if($mammals['captivity_wild']=='Wild') {echo 'checked';}?>>
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
                                            <input type="Date" name="new_date_joined" class="form-control" value="<?php echo $mammals['date_joined']?>" required>
                                        </div>
                                     </div>

                                         <div class="form-group">
                                            <label>Dimension</label>
                                        <!-- previous stored average dimension is retrieved in the textbox and data in the textbox are able to replace with new value-->
                                            <input type="text" name="new_dimension" class="form-control" value="<?php echo $mammals['dimension']?>" required>
                                        </div>

                                         <div class="form-group">
                                            <label>Average Dimension</label>
                                        <!-- previous stored average dimension is retrieved in the textbox and data in the textbox are able to replace with new value-->
                                            <input type="text" name="new_avergae_dimension" class="form-control" id="email" value="<?php echo $mammals['average_dimension']?>" required>
                                        </div>

                                         <div class="form-group">
                                            <label>Life Span</label>
                                        <!-- previous stored life span is retrieved in the textbox and data in the textbox are able to replace with new value-->
                                            <input type="text" name="new_life" class="form-control" value="<?php echo $mammals['life']?>" required>
                                        </div>

                                         <div class="form-group">
                                            <label>Dietary</label>
                                        <!-- previous stored dietary is retrieved in the textbox and data in the textbox are able to replace with new value-->

                                            <input type="text" name="new_dietary" class="form-control" value="<?php echo $mammals['dietary']?>" required>
                                        </div>

                                         <div class="form-group">
                                            <label>Habitat</label>
                                        <!-- previous stored habitat is retrieved in the textbox and data in the textbox are able to replace with new value-->
                                            <input type="text" name="new_habitat" class="form-control" value="<?php echo $mammals['habitat']?>" required>
                                        </div>

                                         <div class="form-group">
                                            <label>Notes</label>
                                        <!-- previous stored note is retrieved in the textbox and data in the textbox are able to replace with new value-->
                                            <input type="text" name="new_note" class="form-control" value="<?php echo $mammals['note']?>" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Gestational Period</label>
                                        <!-- previous stored gestational period is retrieved in the textbox and data in the textbox are able to replace with new value-->
                                            <input type="text" name="new_gestational" class="form-control" value="<?php echo $mammals['gestational']?>" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Mammal Category</label>
                                        <!-- previous stored mammal category is retrieved in the textbox and data in the textbox are able to replace with new value-->
                                            <input type="text" name="new_mammal_category" class="form-control" value="<?php echo $mammals['mammal_category']?>" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Colour Varianats</label>
                                        <!-- previous stored colour variants is retrieved in the textbox and data in the textbox are able to replace with new value-->
                                            <input type="text" name="new_mammal_colour" class="form-control" value="<?php echo $mammals['mammal_colour']?>"required>
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