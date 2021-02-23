<div class="wrapper row-offcanvas row-offcanvas-left">
  <aside class="left-side sidebar-offcanvas">
    <section class="sidebar">
        <ul class="sidebar-menu">
          <!-- dashboard of the admin page -->
          <li class="active">
            <!-- link of the home page which leads to the admin  homepage-->
            <a href="admin_home.php">
              <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            </a>
          </li>
   
          <li class="treeview">
            <a href="#">
              <i class="fa fa-plus-circle"></i> <span>Animals</span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <!-- dropdown menu which leads to add and view page of animal categories --> 
              <ul class="treeview-menu">
                <li><a href="add_mammal.php"><i class="fa fa-angle-double-right"></i>Add Mammal</a></li>
                <li><a href="view_mammal.php"><i class="fa fa-angle-double-right"></i>View Mammal</a></li>
                <li><a href="add_bird.php"><i class="fa fa-angle-double-right"></i>Add Bird</a></li>
                <li><a href="view_bird.php"><i class="fa fa-angle-double-right"></i>View Bird</a></li>
                <li><a href="add_fish.php"><i class="fa fa-angle-double-right"></i>Add Fish</a></li>
                <li><a href="view_fish.php"><i class="fa fa-angle-double-right"></i>View Fish</a></li>
                <li><a href="add_reptile.php"><i class="fa fa-angle-double-right"></i>Add Reptile</a></li>
                <li><a href="view_reptile.php"><i class="fa fa-angle-double-right"></i>View Reptile</a></li>
              </ul>
          </li>

          <li class="treeview">
            <a href="#">
              <i class="fa fa-user"></i> <span>Sponsors</span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <!-- dropdown menu which leads to add and view page of sponsor  --> 
              <ul class="treeview-menu">
                <li><a href="add_sponsors.php"><i class="fa fa-angle-double-right"></i>Add</a></li>
                <li><a href="view_sponsors.php"><i class="fa fa-angle-double-right"></i>View</a></li>
              </ul>
          </li>
          
          <li class="treeview">
            <a href="#">
              <i class="fa fa-user"></i> <span>ZooKeeper</span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <!-- dropdown menu which leads to add and view page of animal zookeeper  --> 
              <ul class="treeview-menu">
                <li><a href="add_zookeeper.php"><i class="fa fa-angle-double-right"></i>Add</a></li>
                <li><a href="view_zookeeper.php"><i class="fa fa-angle-double-right"></i>View</a></li>
              </ul>
          </li>

           <!-- link of the user page which leads to the page where users are displayed -->
          <li>
            <a href="view_users.php">
              <i class="fa fa-user"></i><span>Users</span>
            </a>
          </li>
          
          <!-- link which leads to the page where booked ticket and archived tickets are displayed -->
          <li class="treeview">
            <a href="#">
              <i class="fa fa-plus-circle"></i><span>Booked Ticket</span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
              <li><a href="view_booked_ticket.php"><i class="fa fa-angle-double-right"></i>View Booked Ticket</a></li>
              <li><a href="view_archive_ticket.php"><i class="fa fa-angle-double-right"></i>Archived Ticket</a></li>
            </ul>
          </li>
          
          <!-- link which leads to the page where feedback and archived feedbacks are displayed -->
          <li class="treeview">
            <a href="#">
              <i class="fa fa-plus-circle"></i><span>Feedback</span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
              <li><a href="view_feedback.php"><i class="fa fa-angle-double-right"></i>View Feedback</a></li>
                <li><a href="view_archive_feedback.php"><i class="fa fa-angle-double-right"></i>Archived Feedback</a></li>
              </ul>
          </li>

        </ul>
    </section>
  </aside>    
