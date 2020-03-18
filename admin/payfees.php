<?php
include_once('../connection.php');
include_once('header.php');

/******************************************/
/**************take user back to loging page
 if attempt accessing page
  without authentication******************/
  /******************************************/
//if (!isset($_SESSION['user'])) {
//  header('Location:slogin.php');
//}
$fbMSG = "";
	$pname = "";
	$prelation = "";
	$pphone = "";
	$student_id = "";
	$pdate = "";
	$amount = "";
	$offlineref = "";


	/***************************************/
	/******function validate input data*****/
	/***************************************/
function validate_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
	}

	if (isset($_POST['pay'])) {

	/***************************************/
	/**********validating input data********/
	/***************************************/
			$student_id = validate_input($_POST['student_id']);
			$amount = validate_input($_POST['amount']);
			$pdate = validate_input($_POST['pdate']);
			$offlineref = validate_input($_POST['offlineref']);
			$phone_no = validate_input($_POST['phone_no']);

			$query = mysqli_query($conn,"select * from fees where student_id = '$student_id'");
			if (mysqli_num_rows($query) > 0) {
				$check  = mysqli_fetch_assoc($query);
				if ($check['student_id']==$student_id || $check['offline_reference']==$offlineref) {

				$fbMSG = '<div class="alert alert-danger">This student has already paid,  Please check the student ID or reference number and try!</div>';
				}
			}else {
					$results = mysqli_query($conn, "insert into fees values('', '$amount','$pdate','$offlineref','$student_id','$phone_no')");
					if ($results==1) {

						$fbMSG = '<div class="alert alert-success">Payment successful!</div>';
						mysqli_query($conn,  "update student set fees_status = 'paid' where student_id= '$student_id'");
					}


				}
	}



 ?>


<div class="container shadow mt-5">
	<div class="justify-content-center">
		<h2 class="login-title">Pay School Fees</h2>
		<hr class="color_line">
		<form  role="form" action="payfees.php" method="post">

			<?php echo $fbMSG;?>
			<div class="row shadow pt-4">

			<div class="form-group col-lg-6">
				<label for="student id" class="input-group"><span class="fa fa-user"> Student ID:</span></label>
				<input type="text" name="student_id" id="student_id" class="form-control input-group-sm" placeholder="Enter Student ID." required>
			</div>

			<div class="form-group col-lg-6">
				<label for="amount" class="input-group"><span class="fa fa-money-bill"> Amount:</span></label>
				<input type="number" name="amount" value="8560" id="amount" class="form-control input-group-sm" placeholder="Enter amount." required>
			</div>

			<div class="form-group col-lg-6">
				<label for="date" class="input-group"><span class="fa fa-calendar"> Date:</span></label>
				<input type="date" name="pdate" id="pdate" class="form-control input-group-sm" required>
			</div>

			<div class="form-group col-lg-6">
				<label  for="reference number" class="input-group"><span class="fa fa-receipt"> Payment Reference Number:</span></label>
				<input type="number" name="offlineref" id="offlineref" class="form-control input-group-sm" placeholder="Enter  reference." required>
			</div>

			<div class="form-group col-lg-6">
				<label for="phone number" class="input-group"><span class="fa fa-phone"> Phone Number:</span></label>
				<input type="number" name="phone_no" id="phone_no" class="form-control input-group-sm" placeholder="Enter  Phone Number." required>
			</div>

			<div class="form-group col-lg-6">
				<button type="submit"  name="pay" class="btn-block p-2" style="background-color: #8b4513; color: white; margin-top:22px; border-radius:5px;">Pay</button>
			</div>


		</div>


		</form>

	</div>
</div>
<?php
include_once('scripts.php');
	include('footer.php');
?>
