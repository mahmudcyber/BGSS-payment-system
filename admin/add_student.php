<?php
	include_once('../connection.php');
  include_once('header.php');
	/******************************************/
	/**************take user back to loging page
	 if attempt accessing page
	  without authentication******************/
		/******************************************/
	// if (!isset($_SESSION['student'])) {
	//   header('Location:login.php');
	// }


	$fbMSG = "";
	$fname = "";
	$mname = "";
	$lname = "";
	$sid = "";
	$email = "";
	$class = "";
	$phone_no = "";
	$dob = "";
	$reg_date = "";
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

	if (isset($_POST['add_student'])) {

	/***************************************/
	/**********validating input data********/
	/***************************************/
		  $fname = validate_input($_POST['fname']);
			$mname = validate_input($_POST['mname']);
			$lname = validate_input($_POST['lname']);
			$sid = validate_input($_POST['student_id']);
			$email = validate_input($_POST['email']);
			$class = validate_input($_POST['class']);
			$dob = validate_input($_POST['date_of_birth']);
			$phone_no = validate_input($_POST['phone_no']);
			$reg_date = validate_input($_POST['reg_date']);
			$pass = validate_input($_POST['password']);
			$password =  md5($pass);

			// check if student exist with same id//
			$check = mysqli_query($conn,"select * from student where student_id='$sid'");
			if (mysqli_num_rows($check)>0) {
				$see = mysqli_fetch_assoc($check);
				if ($see['student_id']==$sid) {

					$fbMSG = '<div class="alert alert-danger">There exist student with this admission number!</div>';
				}
			}else {
						$results = mysqli_query($conn,"INSERT INTO student VALUES('','$sid','$fname','$mname','$lname', '$email','$phone_no','$class','$dob','$reg_date','not paid','$password')");
		      	if ($results ==  1) {
							$fbMSG = '<div class="alert alert-success">Student added successful!</div>';
						}
		    }

	}


?>

<div class="container shadow">
	<div class="justify-content-center">
		<h2 class="login-title mt-4">Add Student</h2>
		<hr class="color_line">
		<form  role="form" action="add_student.php" method="post">

			<?php echo $fbMSG;?>
			<div class="row shadow">

			<div class="form-group col-lg-6">
				<label class="input-group">Student ID:</label>
				<input type="text" name="student_id" id="studentId" class="form-control input-group-sm" placeholder="Enter Student ID" required>
			</div>

			<div class="form-group col-lg-6">
				<label class="input-group">First Name:</label>
				<input type="text" name="fname" id="fname" class="form-control input-group-sm" placeholder="Enter first Name." required>
			</div>

			<div class="form-group col-lg-6">
				<label class="input-group">Middle Name:</label>
				<input type="text" name="mname" id="mname" class="form-control input-group-sm" placeholder="Enter middle Name(optional).">
			</div>

			<div class="form-group col-lg-6">
				<label class="input-group">Last Name:</label>
				<input type="text" name="lname" id="lname" class="form-control input-group-sm" placeholder="Enter last Name." required>
			</div>

			<div class="form-group col-lg-6">
				<label class="input-group">Email:</label>
				<input type="email" name="email" id="email" class="form-control input-group-sm" placeholder="Enter Email" required>
			</div>

			<div class="form-group col-lg-6">
				<label class="input-group">Phone Number:</label>
				<input type="text" name="phone_no" id="phone_no" class="form-control input-group-sm" placeholder="Enter Phone Number" required>
			</div>

			<div class="form-group col-lg-6">
				<label class="input-group">Class:</label>
				<input type="text" name="class"  id="class" class="form-control input-group-sm" placeholder="Enter Class." required>
			</div>

			<div class="form-group col-lg-6">
				<label class="input-group">Date Of Birth:</label>
				<input type="date" name="date_of_birth"  id="date_of_birth" class="form-control input-group-sm" required>
			</div>

			<div class="form-group col-lg-6">
				<label class="input-group">Registeration Date:</label>
				<input type="date" name="reg_date" id="reg_date" class="form-control input-group-sm"  required>
			</div>

			<div class="form-group col-lg-6">
				<label class="input-group">Password:</label>
				<input type="password" name="password" id="password" class="form-control input-group-sm"  required>
			</div>

			<div class="form-group col-lg-12">
				<button type="submit"  name="add_student" class="btn-block " style="background-color:#8b4513; color:white; margin-top:30px; border-radius:5px;">Add</button>

			</div>
		</div>
		</form>


	</div>
</div>










<?php
include_once('scripts.php');
	include('footer.php');
?>
