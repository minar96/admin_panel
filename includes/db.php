<?php

	$db = mysqli_connect("localhost", "root", "", "blog_com");


	if($db){
		// echo "Database connection Established";
	}else{
		die("Database connectin Failed" .mysqli_error($db));
	}


?>