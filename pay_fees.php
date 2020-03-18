<?php
	include_once('connection.php');

	/******************************************/
	/**************take user back to loging page
	 if attempt accessing page
	  without authentication******************/
	  /******************************************/
	//if (!isset($_SESSION['user'])) {
	//  header('Location:slogin.php');
	//}
	$fbMSG = "";
		$phone_no = "";
		$student_id = "";
		$pdate = "";
		$amount = "";
		$email = "";


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

				$phone_no = validate_input($_POST['phone_no']);
				$student_id = validate_input($_POST['student_id']);
				$amount = validate_input($_POST['amount']);
				$pdate = validate_input($_POST['pdate']);
				$email = validate_input($_POST['email']);


					$results = mysqli_query($conn, "insert into fees values('', '$amount','$pdate','','$student_id','$phone_no')");

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
					<li><a href="index.php"><i class="fa fa-home"></i></a></li>
					<li><a href="logout.php"><i class="fa fa-power-off "></i>Logout</a></li>

				</ul>
			</div>
		</nav>
		<br>
		<br>
		<br>
		<br>

<div class="container shadow " style="width: 50%;font-size:16px;">
	<div class="justify-content-center">
		<h2 class="login-title">Pay School Fees</h2>
		<hr class="color_line">
		<div class="alert alert-info" id="self">
			<p><strong>Note: </strong> Click the button "Pay" bellow to make payment.<br> On payment successful, copy your reference number <br> and take it to your school accountant for completion<br> of your payment.</p>


		</div>
		<p class="alert alert-danger">Never show your reference number to anybody!</p>
			<?php echo $fbMSG;?>


			<form>
			<script src="https://js.paystack.co/v1/inline.js"></script>

			<!-- <div class="row shadow pt-4">

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
				<label  for="email" class="input-group"><span class="fa fa-receipt"> Email:</span></label>
				<input type="email" name="email" id="email" class="form-control input-group-sm" placeholder="Enter  Email." required>
			</div>

			<div class="form-group col-lg-6">
				<label for="phone number" class="input-group"><span class="fa fa-phone"> Phone Number:</span></label>
				<input type="number" name="phone_no" id="phone_no" class="form-control input-group-sm" placeholder="Enter  Phone Number." required>
			</div> -->

			<div class=" form-group col-lg-12 pb-4 pt-4">
				 <button type="button" id="pay" onclick="payWithPaystack();" class="btn-block" > Pay
				</button>


			</div>


		</div>


		</form>

	</div>
</div>




	</body>
<!---------------------------------->
<!---------paystack functions------->
<!---------------------------------->
<script>
  function payWithPaystack(){
    var handler = PaystackPop.setup({
      key: 'pk_test_621ab259ba0863227d3145307ffcf8defe82f155',
      email: 'cutomer@mail.com',
      amount: 856000,
      currency: "NGN",
      ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
      firstname: 'Aminu',
      lastname: 'Hussain',
      label: "SSSBGFPS",
      metadata: {
         custom_fields: [
            {
                display_name: "Mobile Number",
                variable_name: "mobile_number",
                value: "+2349034567834"
            }
         ]
      },
      callback: function(response){
          alert('success. transaction ref is ' + response.reference);
      },
      onClose: function(){
          alert('window closed');
      }
    });
    handler.openIframe();
  }
</script>

<!-------------------------------->
<!--------------footer------------>
<!-------------------------------->

<footer class="sticky-footer">
  <div class="container my-auto">
    <div class="copyright text-center my-auto">
      <small>Science  Secondary School Birnin Gwari Fees Payment System Developed By: Aminu Hassan. Copyright © Reserved 2019</small>
    </div>
  </div>
</footer>


<script src="bootstrap4/js/bootstrap.js"></script>
</html>
