<?php



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
		

	</head>
	<body class="bg-light">
		
		
		<script 
		
<form >
  <script src="https://js.paystack.co/v1/inline.js"></script>
	
	<div class="form-group col-lg-6">
				<label class="input-group">First Name:</label>
				<input type="text" name="fname" id="fname" class="form-control input-group-sm" placeholder="Enter first Name." >
			</div>

			<div class="form-group col-lg-6">
				<label class="input-group">Middle Name:</label>
				<input type="text" name="mname" id="mname" class="form-control input-group-sm" placeholder="Enter middle Name(optional).">
			</div>

			<div class="form-group col-lg-6">
				<label class="input-group">Last Name:</label>
				<input type="text" name="lname" id="lname" class="form-control input-group-sm" placeholder="Enter last Name." >
			</div>

			<div class="form-group col-lg-6">
				<label class="input-group">Email:</label>
				<input type="email" name="email" id="email" class="form-control input-group-sm" placeholder="Enter Email" >
			</div>

			<div class="form-group col-lg-6">
				<label class="input-group">Phone NUmber:</label>
				<input type="text" name="phone_no" id="phone_no" class="form-control input-group-sm" placeholder="Enter Phone Number" >
			</div>
	
  <button type="button" onclick="payWithPaystack()"> Pay </button> 
</form>
 
<script>
  function payWithPaystack(){
    var handler = PaystackPop.setup({
      key: 'pk_test_bd99cf9d6291b233effa2f0292dd6a9a1ece69a9',
      email: 'mahmud@email.com',
      amount: 10000,
      currency: "NGN",
      ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
      firstname: 'Mahmud',
      lastname: 'Loko',
      label: "SSBGFPS",
      metadata: {
         custom_fields: [
            {
                display_name: "Mobile Number",
                variable_name: "mobile_number",
                value: "+2348012345678"
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



</body>
</html>
