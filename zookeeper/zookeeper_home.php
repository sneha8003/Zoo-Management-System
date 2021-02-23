<?php
include '../connection/connection.php';//conection to the database
include 'zookeeper_header.php';//conection to the header
include 'zookeeper_sidebar.php';//conection to the sidebar
?>   
    <aside class="right-side">
        <section class="content-header">
            <h1>
            Dashboard
            </h1>
            <!-- displays the path in which page the zookeeper lands-->
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>

        <section class="content">
            <div class="col-lg-4 col-xs-6">
                <div class="small-box bg-light-blue">
                    <div class="inner">
                        <center><h3>
                        Admin
                        </h3></center>
                        <center><p>
                        <?php
                            //selcts the users whose user type is admin
                            $admin = $connection->prepare("SELECT * FROM register WHERE user_type='admin'");
                            $admin->execute();
                            //counts the row of the user type containing admin
                            $total_admin = $admin->rowCount();
                        ?>
                        <!-- displays the total number of the admin -->
                        TOTAL: <?php echo $total_admin; ?>
                        </p></center>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>         
                </div>
            </div>

            <div class="col-lg-4 col-xs-6">
                <div class="small-box bg-light-blue">
                    <div class="inner">
                        <center><h3>
                        Zoo Keeper
                        </h3>
                        <p>
                        <?php
                            //selcts the users whose user type is zookeeper
                            $Keeper = $connection->prepare("SELECT * FROM register WHERE user_type='zookeeper'");
                            $Keeper->execute();
                            //counts the row of the user type containing zookeeper
                            $total_keeper = $Keeper->rowCount();
                        ?>
                        <!-- displays the total number of the zookeeper -->
                        TOTAL: <?php echo $total_keeper; ?>
                        </p></center>
                    </div>
                    <div class="icon">
                    <i class="ion ion-bag"></i>
                    </div>    
                </div>
            </div>

            <div class="col-lg-4 col-xs-6">
                <div class="small-box bg-light-blue">
                    <div class="inner">
                        <center><h3>
                        User
                        </h3>
                        <p>
                        <?php
                            //selcts the users whose user type is user
                            $user = $connection->prepare("SELECT * FROM register WHERE user_type='user'");
                            $user->execute();
                            //counts the row of the user type containing user
                            $total_user = $user->rowCount();
                        ?>
                        <!-- displays the total number of the user -->
                        TOTAL: <?php echo $total_user; ?>
                        </p></center>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                </div>
            </div>
        </section>
    </aside>
   