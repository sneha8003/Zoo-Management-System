<?php
session_start();//session is started
include '../connection/connection.php';//includes the connection to the database
?> 
<!-- scripts  -->
 <head>
        <meta charset="UTF-8">
        <title>AdminLTE | Dashboard</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

        <!-- link for css of daterange picker -->
        <link href="../css/daterangepicker.css" rel="stylesheet" type="text/css" />
        
       <!--  link for css -->
        <link href="../css/AdminLTE.css" rel="stylesheet" type="text/css" />

        <link href="../css/iCheck/minimal/minimal.css" rel="stylesheet" type="text/css" />

        <!-- link for fonts -->
       <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
            
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

        <!-- script for datatable -->
        <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

        <script src="../js/dataTables.bootstrap.js" type="text/javascript"></script>

       <!--  script for daterange picker -->
        <script src="../js/daterangepicker.js" type="text/javascript"></script>

        <script src="../js/app.js" type="text/javascript"></script>
        
<script type="text/javascript">
    $(function() {
        $("#example1").dataTable(
        {
        // script for horizontal scrollbar for the datable for having many records
            "scrollX": true
        });
    });
</script>

<script type="text/javascript">
    $(function() {
    // script for daterangepicker
        $('#reservation').daterangepicker();
    });
</script> 
</head>

<body class="skin-blue">
  <header class="header">
      <!-- logo of the zoo -->
       <a class="logo">
        <img src="../img/logo.jpg">
        </a>
        <!-- login session  -->
        <?php 
        if (isset($_SESSION['login_session'])) {
        ?>
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- toggle navigation appears when responsive-->
            <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <li class="dropdown user user-menu">
                            <!-- dropdown menu when the name  of the loggedin user gets clicked-->
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <!-- displays the username of the loggedin user -->
                                <span> <?php echo $_SESSION['login_session']?>
                                <i class="caret"></i></span>
                             </a>
                           <!-- displays through the dropdown -->
                            <ul class="dropdown-menu">
                                <li class="user-body">
                                <div class="col-md-2">
                                <!--displays the logout link on the dropdown menu and directs to login page when pressed-->
                                <a href="zookeeper_logout.php">Logout</a>
                             </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>    
    </nav>
<?php }?>
</header>