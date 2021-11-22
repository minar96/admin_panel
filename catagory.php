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
	            <h1 class="m-0 text-dark">Manage Catagory</h1>
	          </div><!-- /.col -->
	          <div class="col-sm-6">
	            <ol class="breadcrumb float-sm-right">
	              <li class="breadcrumb-item"><a href="deshboard.php">Dashboard</a></li>
	              <li class="breadcrumb-item active">Manage Catagory</li>
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
						                  Add New Catagory
						                </h3>
					              	</div>
					              <!-- /.Catagory menu start -->
					              	<div class="card-body">
						                <form action="" method="POST">
						                	<div class="form-group">
						                		<label>Catagory Name</label>
						                		<input type="text" name="cat_name" class="form-control" autocomplete="off" required="required">
						                	</div>
						                	<div class="form-group">
						                		<label>Catagory Description</label>
						                		<textarea name="cat_desc" rows="3" class="form-control"></textarea>
						                	</div>
						                	<div class="form-group">
						                		<label>Primary/Sub Catagory</label>
						                		<select name="parent_id" class="form-control">
						                			<option value="0">Please select a catagory</option>

													<?php
														$sql = "SELECT * FROM catagory WHERE parent_id=0";
														$parent_cat = mysqli_query($db, $sql);

														while ($row = mysqli_fetch_assoc($parent_cat)) {
															$cat_id = $row['cat_id'];
															$cat_name = $row['cat_name'];
															?>
															<option value="0 <?php echo $cat_id ?>"><?php echo $cat_name ?></option>

													<?php	}
													?>

						                		</select>
						                	</div>
						                	<div class="form-group">
						                		<input type="submit" name="addCatagory" class="btn bg-gradient-primary btn-flat" value="Add Catagory">
						                	</div>
						                </form>
					              	</div>
					        	</div>
					        	<!-- /.Catagory menu end -->

								<?php
								if(isset($_GET['update'])){
									$update_cat_id = $_GET['update'];
									$sql = "SELECT * FROM catagory WHERE cat_id='$update_cat_id'";
									$update_cat_info = mysqli_query($db, $sql);
									while ($row = mysqli_fetch_assoc($update_cat_info)) {
										$cat_id = $row['cat_id'];
										$cat_name = $row['cat_name'];
										$cat_desc = $row['cat_desc'];
										$parent_id = $row['parent_id'];
										?>
										

										<!-- update menu start -->
										<div class="card">
							              	<div class="card-header">
								                <h3 class="card-title">
								                  <i class="fas fa-text-width"></i>
								                 Update Catagory Info
								                </h3>
							              	</div>
						              		<div class="card-body">
							                <form action="" method="POST">
							                	<div class="form-group">
							                		<label>Catagory Name</label>
							                		<input type="text" name="cat_name" class="form-control" autocomplete="off" required="required" value="<?php echo $cat_name; ?>">
							                	</div>
							                	<div class="form-group">
							                		<label>Catagory Description</label>
							                		<textarea name="cat_desc" rows="3" class="form-control"><?php echo $cat_desc; ?></textarea>
							                	</div>
							                	<div class="form-group">
							                		<label>Primary/Sub Catagory</label>
							                		<select name="parent_id" class="form-control">
							                			<option value="0">Please select a catagory</option>

														<?php
															$sql = "SELECT * FROM catagory WHERE parent_id=0";
															$parent_cat = mysqli_query($db, $sql);

															while ($row = mysqli_fetch_assoc($parent_cat)) {
																$cat_id = $row['cat_id'];
																$cat_name = $row['cat_name'];
																?>
																<option value="0 <?php echo $cat_id ?>"><?php echo $cat_name; ?></option>

														<?php	}
														?>

							                		</select>
							                	</div>
							                	<div class="form-group">
							                		<input type="submit" name="updateCatagory" class="btn bg-gradient-primary btn-flat" value="Save Changes">
							                	</div>
							                </form>
						              	</div>
					        		</div>
					        	<!-- Update menu end -->


								<?php	}
								}

								?>


			          	</div>


			          	<!-- Add new Catagory -->
			          	<?php

				          	if (isset($_POST['addCatagory'])) {
				          		$cat_name = $_POST['cat_name'];
								$cat_desc = $_POST['cat_desc'];
								$parent_id = $_POST['parent_id'];

								$sql = "INSERT INTO catagory (cat_name, cat_desc, parent_id) VALUES ('$cat_name', '$cat_desc', '$parent_id')";

								$add_cat = mysqli_query($db, $sql);

								if ($add_cat) {
									header("Location: catagory.php");
								}
								else{
									die("Database connectin Failed" .mysqli_error($db));

								}

				          	}

			          	?>


			          	<div class="col-lg-6">
							<div class="card">
					              	<div class="card-header">
						                <h3 class="card-title">
						                  <i class="fas fa-text-width"></i>
						                  All Catagory List
						                </h3>
					              	</div>
					              <!-- /.Catagory menu start -->
					              	<div class="card-body">
						                <table id="table1" class="table table-bordered table-striped">
							                  	<thead>
								                  <tr>
								                    <th>SL</th>
								                    <th>Catagory Name</th>
								                    <th>Parent Status</th>
								                    <th>Action</th>
								                  </tr>
							                  	</thead>
							                  	<tbody>
													
													<?php
														// Read all catagory
														$sql = "SELECT * FROM catagory";
														$add_cat = mysqli_query($db, $sql);
														$num_rows = mysqli_num_rows($add_cat);
														$i=0;

														if($num_rows==0){ ?>
															<p>No Catagory Found</p>
														<?php }

														else{
															while ($rows = mysqli_fetch_assoc($add_cat)) {
																$cat_id = $rows['cat_id'];
																$cat_name = $rows['cat_name'];
																$cat_desc = $rows['cat_desc'];
																$parent_id = $rows['parent_id'];
																$i++;
																?>
																<tr>
																	<td><?php echo $i; ?></td>
										                  			<td><?php echo $cat_name; ?></td>
										                  			<td>
										                  				<?php

										                  				if($parent_id==0){?>
										                  					<span class="badge badge-success">
										                  						primary catagory
										                  					</span>
										                  				<?php }

										                  				else{
										                  					$sql = "SELECT * FROM catagory WHERE cat_id ='$parent_id'";
										                  					$sub_cat = mysqli_query($db, $sql);
										                  					while ($rows = mysqli_fetch_assoc($sub_cat)) 	{
																						$parent_cat_id = $rows['cat_id'];
																						$parent_cat_name = $rows['cat_name']; ?>
																						<span class="badge badge-primary">
										                  						<?php echo $cat_name; ?></span>
																				<?php	}
										                  				}

										                  				?>
										                  			</td>
										                  			<td>
										                  				<div class="action-bar">
										                  					<ul>
										                  						<li data-toggle="tooltip" data-placement="bottom" title="view">
										                  							<a href="">
										                  								<i class="fa fa-eye"></i>
										                  							</a>
										                  						</li>
										                  						<li data-toggle="tooltip" data-placement="bottom" title="update">
										                  							<a href="catagroy.php?update=<?php echo $cat_id; ?>">
										                  								<i class="fa fa-edit"></i>
										                  							</a>
										                  						</li>
										                  						<li data-toggle="tooltip" data-placement="bottom" title="delete">
										                  							<a href="">
										                  								<i class="fa fa-trash"></i>
										                  							</a>
										                  						</li>
										                  					</ul>
										                  				</div>
										                  			</td>
								                  				</tr>
															<?php }
														}
													?>	
							                  	</tbody>
							            </table>
					              	</div>
					              <!-- /.Catagory menu end -->
					        </div>
			          	</div>
		      		</div>
		  		</div>
			</section>
	</div>

<?php
  include "includes/footer.php";
?>
