<?php
  include "includes/header.php";
?>

<!-- Content Wrapper start. Contains page content start -->
  	<div class="content-wrapper">
	    <!-- Content Header (Page header) -->
	    <div class="content-header">
	      <div class="container-fluid">
	        <div class="row mb-2">
	          <div class="col-sm-6">
	            <h1 class="m-0 text-dark">Blank Page Tamplate</h1>
	          </div><!-- /.col -->
	          <div class="col-sm-6">
	            <ol class="breadcrumb float-sm-right">
	              <li class="breadcrumb-item"><a href="deshboard.php">Dashboard</a></li>
	              <li class="breadcrumb-item active">Blank Tamplate</li>
	            </ol>
	          </div><!-- /.col -->
	        </div><!-- /.row -->
	      </div><!-- /.container-fluid -->
	    </div>
	    <!-- /.content-header -->
<!-- Content Wrapper end. Contains page content end -->
			
			<section class="content">
		      	<div class="container-fluid">
		        	<div class="row">
			          <div class="col-lg-6">
							<div class="card">
					              	<div class="card-header">
						                <h3 class="card-title">
						                  <i class="fas fa-text-width"></i>
						                  Description
						                </h3>
					              	</div>
					              <!-- /.card-header -->
					              	<div class="card-body">
						                <table class="table table-dark table-bordered table-hover">
										  <tbody>

											<?php
											$userID = $_SESSION['id'];
											$sql = "SELECT * FROM users WHERE id = '$userID'";
											$readUserDate = mysqli_query($db, $sql);
											while($row = mysqli_fetch_assoc($readUserDate) ){
													$id 		= $row['id'];
													$full_name 	= $row['full_name'];
													$email 		= $row['email'];
													$user_name 	= $row['user_name'];
													$password 	= $row['password'];
													$image 		= $row['image'];
													$phone 		= $row['phone'];
													$address 	= $row['address'];
													$role 		= $row['role'];
													$status 	= $row['status'];
													$join_date 	= $row['join_date'];
													?>
													<tr>
												      <th scope="row">Profile Picture</th>
												      <td><img src="image/editor <?php echo $image; ?>" width="35"></td>
												    </tr>
												    <tr>
												      <th scope="row">Full Name</th>
												      <td><?php echo $full_name; ?></td>
												    </tr>
												    <tr>
												      <th scope="row">User Name</th>
												      <td><?php echo $user_name; ?></td>
												    </tr>
												    <tr>
												      <th scope="row">Email</th>
												      <td><?php echo $email; ?></td>
												    </tr>
												    <tr>
												      <th scope="row">Phone</th>
												      <td><?php echo $phone; ?></td>
												    </tr>
												    <tr>
												      <th scope="row">Address</th>
												      <td><?php echo $address; ?></td>
												    </tr>
												    <tr>
												      <th scope="row">User Role</th>
												      <td>
												      	<?php 
												      	if($role==1){ ?>
															<span class="badge badge-success">Admin</span>
												      	<?php }
												      	else if ($role==2) { ?>
												      		<span class="badge badge-primary">Editor</span>
												      	<?php }
												      	else if ($role==3) { ?>
												      		<span class="badge badge-warning">User</span>
												      	<?php }

												      	?>
												      </td>
												    </tr>
												    <tr>
												      <th scope="row">Account Status</th>
												      <td>
												      	<?php 
												      	if($status==1){ ?>
															<span class="badge badge-success">Active</span>
												      	<?php }
												      	else if ($status==2) { ?>
												      		<span class="badge badge-danger">In-Active</span>
												      	<?php }
												      	?>
												      </td>
												    </tr>
												    <tr>
												      <th scope="row">Join Date</th>
												      <td><?php echo $join_date; ?></td>
												    </tr>
										<?php	}
											?>

										    
										  </tbody>
										</table>
					              	</div>
					              <!-- /.card-body -->
					        </div>
			          </div>
		      		</div>
		  		</div>
			</section>



	</div>

<?php
  include "includes/footer.php";
?>
