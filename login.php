<?php
	include_once('connection.php');

//	if (isset($_SESSION['admin'])) {
//	  header('Location:admin/index.php');
//	}
//
//
//	if (isset($_SESSION['student'])) {
//	  header('Location:payerdetails.php');
//	}

	$err = "";
	$username = "";
	$password = "";


/***************************************/
	/******function validate input data*****/
	/***************************************/
	function validate_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
	}

if(isset($_POST['login_admin'])){
		/***************************************/
	/**********validating input data********/
	/***************************************/
		if(empty($_POST['username']) || empty($_POST['password'])){
	    $err = '<div class=" alert alert-danger"> All fields are required!</div>';
	  }else {
	    $username = validate_input($_POST['username']);
	    $pass = validate_input($_POST['password']);
			$password = md5($pass);

			$queryAdmin = " SELECT * FROM admin_users WHERE Username = '$username' AND Password = '$password' ";
			$adninResult = mysqli_query($conn,$queryAdmin);

			if (mysqli_num_rows($adninResult)==1) {

				$arow = mysqli_fetch_assoc($adninResult);
				$_SESSION['admin'] = $arow;
				if ($_SESSION['admin']['Username'] == $username) {
					header('Location:admin/index.php');
				}
			}

			$queryStudent = " SELECT * FROM student WHERE student_id = '$username' AND password = '$password'";
			$studentResult = mysqli_query($conn,$queryStudent);

			if (mysqli_num_rows($studentResult)==1) {
			$srow = mysqli_fetch_assoc($studentResult);
			$_SESSION['student'] = $srow;
				if ($_SESSION['student']['student_id'] == $username) {
					header('Location:pay_fees.php');
				}

			}


		else{
			$err = '<div class="alert alert-danger">Invalid Email or Password</div>';

		}
	}
}


?>

<!DOCTYPE html>
<html>
	<head>
		<title>Science  Secondary School Birnin Gwari Fees Payment System</title>
		<meta name="viewpot" content="deivice-width=width, initial scale=1.0">
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="bootstrap4/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="fontawesome/css/all.css">
		<link rel="stylesheet" type="text/css" href="css/style.css" >
		<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/cs'>

	</head>
	<body class="bg-light">
		<nav class="navbar-header fixed-top shadow">
			<div class="nav navbar">

				<img src="image/school_logo.png" class=" logo img-fluid">

				<ul class="home_nav">
					<li><a href="index.php"><i class="fa fa-home" style"color:white;"></i></a></li>
				</ul>
			</div>
		</nav>
		<br>
		<br>
		<br>
		<br>


<div class="container shadow" style="width:50%; padding: 20px; margin: 50px auto;">
	<div class=" justify-content-center">
		<h2 class="login-title">Login</h2>
		<hr class="color_line">
		<form role="form" action="login.php" method="post" >
			<?php echo $err; ?>
			<div class="shadow">

			<div class="input-group mt-4">
  				<div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-user-alt"></i></span>
				</div>
  				<input type="text" name="username" id="username" class="form-control input-group" placeholder="Enter Username" >
  			</div>

			<div class="input-group mt-4">
  				<div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-key"></i></span>
				</div>
  				<input type="password" name="password" id="password" class="form-control input-group" placeholder="Enter password" >
  			</div>
			</div>

			<div >
				<button type="submit" class="btn mt-4 shadow" name="login_admin"><i class="fa fa-sign-in-alt"></i>
					Login
				</button>

				<a href="passwordreset.php" class="resetpassword mt-4">Forgot Password</a>
			</div>
		</form>

	</div>

</div>











<?php
	include('footer.php');
?>
