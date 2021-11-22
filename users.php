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
	            <h1 class="m-0 text-dark">Manage All Users</h1>
	          </div><!-- /.col -->
	          <div class="col-sm-6">
	            <ol class="breadcrumb float-sm-right">
	              <li class="breadcrumb-item"><a href="deshboard.php">Dashboard</a></li>
	              <li class="breadcrumb-item active">Manage Users</li>
	            </ol>
	          </div><!-- /.col -->
	        </div><!-- /.row -->
	      </div><!-- /.container-fluid -->
	    </div>
	    <!-- /.content-header -->

			
	<?php

		if($_SESSION['role']==1){

			$do = isset($_GET['do']) ? $_GET['do'] : 'Manage';

			if($do == 'Manage'){ ?>

				<section class="content">
		      	<div class="container-fluid">
		        	<div class="row">
			          <div class="col-lg-12">
							<div class="card">
					              	<div class="card-header">
						                <h3 class="card-title">
						                  <i class="fas fa-text-width"></i>
						                  Manage All Users
						                </h3>
					              	</div>
					              	<div class="card-body">
						               <table class="table">
										  	<thead class="thead-dark table-bordered table-hover table-striped">
											    <tr>
											      <th scope="col">SL</th>
											      <th scope="col">Image</th>
											      <th scope="col">Full Name</th>
											      <th scope="col">User Name</th>
											      <th scope="col">Email</th>
											      <th scope="col">Address</th>
											      <th scope="col">Phone</th>
											      <th scope="col">Role</th>
											      <th scope="col">Status</th>
											      <th scope="col">Join Date</th>
											      <th scope="col">Action</th>
											    </tr>
											</thead>
											<tbody>

												<?php

												$sql="SELECT * FROM users ORDER BY id DESC";
												$allUsers = mysqli_query($db, $sql);
												$i=0;
												while ($row = mysqli_fetch_assoc($allUsers)) {
													$id 			= $row['id'];
													$full_name 		= $row['full_name'];
													$email 			= $row['email'];
													$user_name 		= $row['user_name'];
													$password 		= $row['password'];
													$image 			= $row['image'];
													$phone 			= $row['phone'];
													$address 		= $row['address'];
													$role 			= $row['role'];
													$status 		= $row['status'];
													$join_date 		= $row['join_date'];
													$i++;
												?>

												<tr>
												      <th scope="row"><?php echo $i; ?></th>
												      <td>
												      	<?php 
												      		if(!empty($image)){ 
												      			if($role==1){ ?>
																	<img src="image/Admin/<?php echo $image;?>" width="35">
												      		<?php	}
																else if($role==2){ ?>
																	<img src="image/editors/<?php echo $image;?>" width="35">
																<?php	}
																else if($role==3){ ?>
																	<img src="image/users/<?php echo $image;?>" width="35">
																<?php	}
															}
												      		else{ ?>
												      			<img src="image/avatar.png" width="35">

												      	<?php	}

												      	?>
												      		
												      	</td>
												      <td><?php echo $full_name; ?></td>
												      <td><?php echo $user_name; ?></td>
												      <td><?php echo $email; ?></td>
												      <td><?php echo $address; ?></td>
												      <td><?php echo $phone; ?></td>
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
												      <td><?php echo $join_date; ?></td>
												      	<td>
															<div class="action-bar">
											                  	<ul>
											                  		<li data-toggle="tooltip" data-placement="bottom" title="view">
											                  			<a href="">
											                  				<i class="fa fa-eye"></i>
											                  			</a>
											                  		</li>
											                  		<li data-toggle="tooltip" data-placement="bottom" title="update">
											                  			<a href="users.php?do=Edit&id=<?php echo $id; ?>">
											                  				<i class="fa fa-edit"></i>
											                  			</a>
											                  		</li>
											                  		<li data-toggle="tooltip" data-placement="bottom" title="delete">
											                  			<a href="" data-toggle="modal" data-target="#deleteUser <?php echo $id; ?>">
											                  				<i class="fa fa-trash"></i>
											                  			</a>
											                  		</li>
											                  	</ul>
											                 </div>
											      		</td>
															
															<!-- Modal start-->
															<div class="modal fade" id="deleteUser <?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
															  <div class="modal-dialog" role="document">
															    <div class="modal-content">
															      <div class="modal-header">
															        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
															        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
															          <span aria-hidden="true">&times</span>
															        </button>
															      </div>
															      <div class="modal-body">
															        <div class="model-confirmation">
															        	<ul>
															        		<li>
															        			<a href="uesrs.php?do=Delete&id=<?php echo $id; ?>" class="btn btn-primary">Yes</a>
															        		</li>
															        		<li>
															        			<button type="button" class="btn btn-danger" data-dimiss="modal">No</button>
															        		</li>
															        	</ul>
															        </div>
															      </div>
															    </div>
															  </div>
															</div>
															<!-- Modal end-->


											    </tr>

											<?php	}
											//end while loop

												?>
											    
										  	</tbody>
										</table>
					              	</div>
					        </div>
			          </div>
		      		</div>
		  		</div>
			</section>
				
			<?php 	}
			else if($do=='Add'){ ?>
				
				<section class="content">
		      	<div class="container-fluid">
		        	<div class="row">
			          <div class="col-lg-12">
							<div class="card">
					              	<div class="card-header">
						                <h3 class="card-title">
						                  <i class="fas fa-text-width"></i>
						                  Register New User
						                </h3>
					              	</div>
					              
					              	<div class="card-body">
					              		<div class="row">
						              			<div class="col-lg-6">
								               	<form action="?do=Insert" method="POST" enctype="multipart/form-data">
								               		<div class="form-group">
								               			<label for="">Full Name</label>
								               			<input type="text" name="full_name" class="form-control" autocomplete="off">
								               		</div>
								               		<div class="form-group">
								               			<label for="">User Name</label>
								               			<input type="text" name="user_name" class="form-control" required="required" autocomplete="off">
								               		</div>
								               		<div class="form-group">
								               			<label for="">Email</label>
								               			<input type="email" name="email" class="form-control" required="required" autocomplete="off">
								               		</div>
								               		<div class="form-group">
								               			<label for="">Password</label>
								               			<input type="password" name="password" class="form-control">
								               		</div>
								               		<div class="form-group">
								               			<label for="">Conform Password</label>
								               			<input type="password" name="conPass" class="form-control">
								               		</div>
								               		
							               </div>
							               <div class="col-lg-6">
							               			<div class="form-group">
								               			<label for="">phone</label>
								               			<input type="text" name="phone" class="form-control" autocomplete="off">
								               		</div>
								               		<div class="form-group">
								               			<label for="">Address</label>
								               			<input type="text" name="address" class="form-control" autocomplete="off">
								               		</div>
													<div class="form-group">
								               			<label for="">User Role</label>
								               			<select name="role" class="form-control">
								               				<option value="">Please select user role</option>
								               				<option value="1">Admin</option>
								               				<option value="2">Editor</option>
								               				<option value="3">User</option>
								               			</select>
								               		</div>
								               		<div class="form-group">
								               			<label for="">Account Status</label>
								               			<select name="status" class="form-control">
								               				<option value="">Please select account status</option>
								               				<option value="1">Active</option>
								               				<option value="2">In-Active</option>
								               			</select>
								               		</div>
								               		<div class="form-group">
								               			<label for="">Profile Picture</label>
								               			<input type="file" class="form-control-file" name="image">
								               		</div>
								               		<div class="form-group">
								               			<input type="submit" name="addUser" class="btn bg-gradient-primary btn-flat" value="Register User">
								               		</div>
							               		</form>
							               </div>
					              		</div>
					              	</div>
					              
					        </div>
			          </div>
		      		</div>
		  		</div>
			</section>



			<?php 	}
			else if($do=='Insert'){ 
				if($_SERVER['REQUEST_METHOD']=='POST'){
					$name 		= $_POST['full_name'];
					$user_name 	= $_POST['user_name'];
					$email 		= $_POST['email'];
					$password 	= $_POST['password'];
					$conPass	= $_POST['conPass'];
					$phone 		= $_POST['phone'];
					$address 	= $_POST['address'];
					$role 		= $_POST['role'];
					$status 	= $_POST['status'];

					$imageName 	= $_FILES['image']['name'];
					$imageTmp 	= $_FILES['image']['tmp_name'];

					if($password==$conPass){
						// Encrypted Password
						$hassedPass = sha1($password);
						// Organized image file and its name
						if($role==1){
							// Organized image file and its name
							$image = rand(0, 5000000) .'_' .$imageName;
							// Move to image in project folder
							move_uploaded_file($imageTmp, "image/admin/" .$image);
						}
						else if($role==2){
							// Organized image file and its name
							$image = rand(0, 5000000) .'_' .$imageName;
							// Move to image in project folder
							move_uploaded_file($imageTmp, "image/editors/" .$image);
						}
						else if($role==3){
							// Organized image file and its name
							$image = rand(0, 5000000) .'_' .$imageName;
							// Move to image in project folder
							move_uploaded_file($imageTmp, "image/users/" .$image);
						}
						else{
							move_uploaded_file($imageTmp, "image/avatar.png" .$image);
						}

						$sql = "INSERT INTO users (full_name,email,user_name,password,image,phone,address,role,status,join_date) VALUES ('$name','$email', '$user_name','$hassedPass','$image','$phone','$address','$role','$status',now())";

						$registerUser = mysqli_query($db, $sql);

						if($registerUser){
							header('Location: users.php?do=Manage');
						}
						else{
							die('Database error' .mysqli_error($db));
						}
					}
				}
			}
			else if($do=='Edit'){
				
				if(isset($_GET['id'])){
					$the_id = $_GET['id'];

					$sql = "SELECT * FROM users WHERE id = '$the_id'";

					$updateUsers = mysqli_query($db, $sql);
					while($row = mysqli_fetch_assoc($updateUsers)){
						$id = $row['id'];
						$full_name = $row['full_name'];
						$email = $row['email'];
						$user_name = $row['user_name'];
						$password = $row['password'];
						$image = $row['image'];
						$phone = $row['phone'];
						$address = $row['address'];
						$role = $row['role'];
						$status = $row['status'];
						$join_date = $row['join_date'];
						?>
						<!-- Update form style start-->
						<section class="content">
		      	<div class="container-fluid">
		        	<div class="row">
			          <div class="col-lg-12">
							<div class="card">
					              	<div class="card-header">
						                <h3 class="card-title">
						                  <i class="fas fa-text-width"></i>
						                  Update User Information
						                </h3>
					              	</div>
					              
					              	<div class="card-body">
					              		<div class="row">
						              			<div class="col-lg-6">
								               	<form action="?do=Update" method="POST" enctype="multipart/form-data">
								               		<div class="form-group">
								               			<label for="">Full Name</label>
								               			<input type="text" name="fullname" class="form-control" required="required" autocomplete="off" value="<?php echo $full_name; ?>">
								               		</div>
								               		<div class="form-group">
								               			<label for="">User Name</label>
								               			<input type="text" name="user_name" class="form-control" required="required" autocomplete="off" value="<?php echo $user_name; ?>" disabled>
								               		</div>
								               		<div class="form-group">
								               			<label for="">Email</label>
								               			<input type="email" name="email" class="form-control" required="required" autocomplete="off" value="<?php echo $email; ?>">
								               		</div>
								               		<div class="form-group">
								               			<label for="">Password</label>
								               			<input type="password" name="password" class="form-control" required="required" placeholder="**********">
								               		</div>
								               		<div class="form-group">
								               			<label for="">Conform Password</label>
								               			<input type="password" name="conPass" class="form-control" required="required" placeholder="**********">
								               		</div>
								               		
							               </div>
							               <div class="col-lg-6">
							               			<div class="form-group">
								               			<label for="">phone</label>
								               			<input type="text" name="phone" class="form-control" required="required" autocomplete="off" value="<?php echo $phone; ?>">
								               		</div>
								               		<div class="form-group">
								               			<label for="">Address</label>
								               			<input type="text" name="address" class="form-control" required="required" autocomplete="off" value="<?php echo $address; ?>">
								               		</div>
													<div class="form-group">
								               			<label for="">User Role</label>
								               			<select name="role" class="form-control">
								               				<option value="">Please select user role</option>
															<option value="1" <?php if($role==1){echo "selected"; } ?>>Admin</option>
								               				<option value="2" <?php if($role==2){echo "selected"; } ?>>Editor</option>
								               				<option value="3" <?php if($role==3){echo "selected"; } ?>>User</option>
								               			</select>
								               		</div>
								               		<div class="form-group">
								               			<label for="">Account Status</label>
								               			<select name="status" class="form-control">
								               				<option value="">Please select account status</option>
								               				<option value="1" <?php if($status==1){echo "selected"; } ?>>Active</option>
								               				<option value="2" <?php if($status==2){echo "selected"; } ?>>In-Active</option>
								               			</select>
								               		</div>
								               		<div class="form-group">
								               			<label for="">Profile Picture</label>
								               			<input type="file" class="form-control-file" name="image">
								               		</div>
								               		<div class="form-group">
								               			<input type="hidden" name="userID" value="<?php echo $id; ?>">
								               			<input type="submit" name="updateUser" class="btn bg-gradient-primary btn-flat" value="Save Changes">
								               		</div>
							               		</form>
							               </div>
					              		</div>
					              	</div>
					              
					        </div>
			          </div>
		      		</div>
		  		</div>
			</section>

						<!-- Update form style start-->

				<?php	}
				}
			}
			else if($do=='Update'){
				if($_SERVER['REQUEST_METHOD']=='POST'){
					$userID = $_POST['userID'];
					$name 		= $_POST['fullname'];					
					$email 		= $_POST['email'];
					// password Processing
					$password 	= $_POST['password'];
					$conPass	= $_POST['conPass'];
					
					$phone 		= $_POST['phone'];
					$address 	= $_POST['address'];
					$role 		= $_POST['role'];
					$status 	= $_POST['status'];

					// Image Processing		
					$imageName 	= $_FILES['image']['name'];
					$imageTmp 	= $_FILES['image']['tmp_name'];

					// New Image and password processing
					if(!empty($password) && !empty($imageName)){
						// Encrypted Password
						$hassedPass = sha1($password);

						// Delete Image
						$query = "SELECT * FROM users WHERE id = '$userID'";
						$selectUser = mysqli_query($db, $query);
						while($row = mysqli_fetch_assoc($selectUser)){
							$exitingImage = $row['image'];
							$exitingImageRole = $row['role'];

						}
						if($exitingImageRole==1){
							unlink("image/admin/" .$exitingImage);
						}
						else if($exitingImageRole==2){
							unlink("image/editors/" .$exitingImage);
						}
						else if($exitingImageRole==3){
							unlink("image/users/" .$exitingImage);
						}


						if($role==1){
							// Organized image file and its name
							$image = rand(0, 5000000) .'_' .$imageName;
							// Move to image in project folder
							move_uploaded_file($imageTmp, "image/admin/" .$image);
						}
						else if($role==2){
							// Organized image file and its name
							$image = rand(0, 5000000) .'_' .$imageName;
							// Move to image in project folder
							move_uploaded_file($imageTmp, "image/editors/" .$image);
						}
						else if($role==3){
							// Organized image file and its name
							$image = rand(0, 5000000) .'_' .$imageName;
							// Move to image in project folder
							move_uploaded_file($imageTmp, "image/users/" .$image);
						}

						

						$sql = "UPDATE users SET full_name='$name',email='$email',user_name='$user_name',password='$hassedPass',image='$image',phone='$phone',address='$address',role='$role',status='$status',join_date=now() WHERE id = '$userID'";

						$updateUserInfo = mysqli_query($db, $sql);

						if($updateUserInfo){
							header('Location: users.php?do=Manage');
						}
						else{
							die('Database error' .mysqli_error($db));
						}
					}
					// Only Image Not password
					else if(empty($password) && !empty($imageName)){
						
						// Delete Image
						$query = "SELECT * FROM users WHERE id = '$userID'";
						$selectUser = mysqli_query($db, $query);
						while($row = mysqli_fetch_assoc($selectUser)){
							$exitingImage = $row['image'];
							$exitingImageRole = $row['role'];

						}
						if($exitingImageRole==1){
							unlink("image/admin/" .$exitingImage);
						}
						else if($exitingImageRole==2){
							unlink("image/editors/" .$exitingImage);
						}
						else if($exitingImageRole==3){
							unlink("image/users/" .$exitingImage);
						}


						if($role==1){
							// Organized image file and its name
							$image = rand(0, 5000000) .'_' .$imageName;
							// Move to image in project folder
							move_uploaded_file($imageTmp, "image/admin/" .$image);
						}
						else if($role==2){
							// Organized image file and its name
							$image = rand(0, 5000000) .'_' .$imageName;
							// Move to image in project folder
							move_uploaded_file($imageTmp, "image/editors/" .$image);
						}
						else if($role==3){
							// Organized image file and its name
							$image = rand(0, 5000000) .'_' .$imageName;
							// Move to image in project folder
							move_uploaded_file($imageTmp, "image/users/" .$image);
						}

						$sql = "UPDATE users SET full_name='$name',email='$email',user_name='$user_name',image='$image',phone='$phone',address='$address',role='$role',status='$status',join_date=now() WHERE id = '$userID'";

						$updateUserInfo = mysqli_query($db, $sql);

						if($updateUserInfo){
							header('Location: users.php?do=Manage');
						}
						else{
							die('Database error' .mysqli_error($db));
						}
					}
					// Only Password Not Image
					else if(!empty($password) && empty($imageName)){
						// Encrypted Password
						$hassedPass = sha1($password);

						$sql = "UPDATE users SET full_name='$name',email='$email',user_name='$user_name',password='$hassedPass',phone='$phone',address='$address',role='$role',status='$status',join_date=now() WHERE id = '$userID'";

						$updateUserInfo = mysqli_query($db, $sql);

						if($updateUserInfo){
							header('Location: users.php?do=Manage');
						}
						else{
							die('Database error' .mysqli_error($db));
						}
					}
					// NO password No Image
					else if(empty($password) && empty($imageName)){
						

						$sql = "UPDATE users SET full_name='$name',email='$email',user_name='$user_name',phone='$phone',address='$address',role='$role',status='$status',join_date=now() WHERE id = '$userID'";

						$updateUserInfo = mysqli_query($db, $sql);

						if($updateUserInfo){
							header('Location: users.php?do=Manage');
						}
						else{
							die('Database error' .mysqli_error($db));
						}
					}
				}
				//end while loop
			}
			else if($do=='Delete'){
				if(isset($_GET['id'])){
					$userDeleteId = $_GET['id'];

					// Delete Image
						$query = "SELECT * FROM users WHERE id = '$userDeleteId'";
						$selectUser = mysqli_query($db, $query);
						while($row = mysqli_fetch_assoc($selectUser)){
							$exitingImage = $row['image'];
							$exitingImageRole = $row['role'];

						}
						if($exitingImageRole==1){
							unlink("image/admin/" .$exitingImage);
						}
						else if($exitingImageRole==2){
							unlink("image/editors/" .$exitingImage);
						}
						else if($exitingImageRole==3){
							unlink("image/users/" .$exitingImage);
						}
						
						$sql = "DELETE FROM users WHERE id = '$userDeleteId'";
						$deleteConfirm = mysqli_query($db, $sql);
						if($deleteConfirm){
							header('Location: users.php?do=Manage');
						}
						else{
							die('Database error' .mysqli_error($db));
						}
				}
			}
		}
		else{ ?>
			<div class="alert alert-warning">You Have To No Right To Access This Page</div>
		<?php 	}	

	?>

<!-- Content Wrapper end. Contains page content end -->

	</div>

<?php
  include "includes/footer.php";
?>



<!-- <section class="content">
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
					              
					              	<div class="card-body">
						                <dl>
						                  <dt>Description lists</dt>
						                  <dd>A description list is perfect for defining terms.</dd>
						                  <dt>Euismod</dt>
						                  <dd>Vestibulum id ligula porta felis euismod semper eget lacinia odio sem nec elit.</dd>
						                  <dd>Donec id elit non mi porta gravida at eget metus.</dd>
						                  <dt>Malesuada porta</dt>
						                  <dd>Etiam porta sem malesuada magna mollis euismod.</dd>
						                </dl>
					              	</div>
					              
					        </div>
			          </div>
		      		</div>
		  		</div>
			</section> -->