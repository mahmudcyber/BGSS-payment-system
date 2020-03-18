<?php
include_once('connection.php');

$err = "";

if(isset($_POST['pay'])){

		/****Validating the input entries*****/
		if(
     empty($_POST['email']) ||
		 empty($_POST['amount']) ||
     empty($_POST['phone'])) {
	    $err = '<div class=" alert alert-danger"> All field are required</div>';
	  }else {

			$email = $_POST['email'];
			$amount = $_POST['amount'];
			$phone = $_POST['phone'];


}}

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

				<img src="image/school_logo.jpg" class=" logo img-fluid">

				<ul class="home_nav">
					<li><a href="index.php">Home</a></li>
				</ul>
			</div>
		</nav>
		<br>
		<br>
		<br>
		<br>

<div class="container shadow mt-lg-5" style="width:50%; margin: 50px auto;">
	<div class="align-content-center pt-4"  >
		<p class="alert alert-info ">Science  Secondary School Birnin Gwari Fees Payment System Developed By: Aminu Hassan. Copyright © Reserved 2019 </p>
		 <form role="form" >
			 <script src="payStack.js"></script>

		<div class="input-group mt-4">
				<div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-envelope"></i></span>
				</div>
					<input type="email" name="email" id="email" class="form-control input-group" placeholder="Enter email" >
			</div>

		<div class="input-group mt-4">
					<div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-dolar"></i></span>
				</div>
					<input type="number" name="amount" id="amount" class="form-control input-group" placeholder="Enter Amount">
			</div>
			 <div class="input-group mt-4">
					<div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-phone-alt"></i></span>
					</div>
						<input type="number" name="phone" id="phone" class="form-control input-group" placeholder="Enter Phone number" >
				</div>
		  <button type="button" class="btn mb-4 " onClick="payWithPaystack()"><i class="fa fa-dollar-sign "></i>Pay</button>
		</form>
	</div>
</div>
	<br>
	<br>

<!---------footer-------->

<footer class="sticky-footer">
  <div class="container my-auto">
    <div class="copyright text-center my-auto">
      <small>Science  Secondary School Birnin Gwari Fees Payment System Developed By: Aminu Hassan. Copyright © Reserved 2019</small>
    </div>
  </div>
</footer>


	</body>

<script src="bootstrap4/js/bootstrap.js"></script>
 <script>
  //Paystack Script Starts
  function payWithPaystack(){
    var handler = PaystackPop.setup({
      key: 'pk_test_bd99cf9d6291b233effa2f0292dd6a9a1ece69a9',
      email: $email;
      amount: 856000,
      ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
      metadata: {
         custom_fields: [
            {
                display_name: "Mobile Number",
                variable_name: "mobile_number",
                value: $phone;
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
//Paystack Script Ends
function w3_open() {
    document.getElementById("mySidenav").style.display = "block";
    document.getElementById("myOverlay").style.display = "block";
}
function w3_close() {
    document.getElementById("mySidenav").style.display = "none";
    document.getElementById("myOverlay").style.display = "none";
}
</script>
</html>
