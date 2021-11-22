<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="deshboard.php" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">

          <?php
          if($_SESSION['role']==1){ ?>
            <img src="image/admin/<?php echo $_SESSION['image']; ?>" class="img-circle elevation-2" alt="User Image">
         <?php  }
          else if($_SESSION['role']==2){ ?>
            <img src="image/editors/<?php echo $_SESSION['image']; ?>" class="img-circle elevation-2" alt="User Image">
        <?php    }
          else if($_SESSION['role']==3){ ?>
            <img src="image/users/<?php echo $_SESSION['image']; ?>" class="img-circle elevation-2" alt="User Image">
          <?php  }
          else{ ?>
            <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
         <?php   }

          ?>



          
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION['full_name']; ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="deshboard.php" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-header">Blog Funtionality</li>

          <!-- catagory menu -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Catagory
                <i class="fas fa-angle-right right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="catagory.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Catagory</p>
                </a>
              </li>
            </ul>  
          </li>


          <!-- post menu -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-mail-bulk"></i>
              <p>
                Post
                <i class="fas fa-angle-right right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="post.php?do=Manage" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage all post</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="post.php?do=Add" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add new post</p>
                </a>
              </li>
            </ul>    
          </li>


           <!-- commet menu -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-comment"></i>
              <p>
                Comment
                <i class="fas fa-angle-right right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage all Comment</p>
                </a>
              </li>
            </ul>    
          </li>

          <?php
            if($_SESSION['role']==1){ ?>
              <li class="nav-header">Platform Settings</li>
                <!-- users menu -->
                <li class="nav-item has-treeview">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                      All Users
                      <i class="fas fa-angle-right right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="users.php?do=Manage" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Manage all Users</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="users.php?do=Add" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Add new user</p>
                      </a>
                    </li>
                  </ul>    
                </li>
              </li>
          <?php  }
            if($_SESSION['role']==2){ ?>
              <li class="nav-header">Profile Page</li>
                <!-- users menu -->
                <li class="nav-item has-treeview">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                      Manage profile
                      <i class="fas fa-angle-right right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="profile.php" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>See Profile Page</p>
                      </a>
                    </li>
                  </ul>    
                </li>
              </li>
           <?php }

          ?>
        

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>