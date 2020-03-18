<?php
include_once('header.php');
include_once('../connection.php');

$err="";

/************get the input field from form***************/
if(isset($_POST['regAdmin'])){

if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['username']) || empty($_POST['password']) || empty($_POST['compassword'])|| empty($_POST['date'])){ $err= '<div class=" alert alert-danger"> All field are required</div>';}
else if($_POST['password'] != $_POST['compassword']) {
  $err= '<div class=" alert alert-danger"> Passwords not match!</div>';
}else {
  $name = validate_input($_POST['name']);
  $username = validate_input($_POST['username']);
  $email = validate_input($_POST['email']);
  $pass = validate_input($_POST['password']);
  $compassword = validate_input($_POST['compassword']);
  $date = validate_input($_POST['date']);
  $password = md5($pass);

  $query = "INSERT INTO admin_users VALUES('','$name','$username','$email', '$password','$date')";


  $result = mysqli_query($conn, $query);
  if ($result == 1){
  header('location:viewAdmins.php');
  }else{

  $err= '<div class=" alert alert-danger" > Failed to add admin, try again!</div';

  }
}
	function validate_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
}

 ?>

  <div class="container">
  	<div class="justify-content-center student_login">
  		<h2 class="login-title">Register</h2>
  		<hr class="color_line">
  		<form role="form" id="regAdminForm" action="register_admin.php" method="post" >
  			<?php echo $err;?>

  			<div class="input-group mt-3">
  				<div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-address-book"></i></span>
				</div>
  				<input type="text" name="name" id="name" class="form-control input-group" placeholder="Enter Name." >
  			</div>

        <div class="input-group mt-3">
  				<div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-user"></i></span>
				</div>
  				<input type="text" name="username" id="username" class="form-control input-group" placeholder="Enter Username." >
  			</div>



        <div class="input-group mt-3">
  				<div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-envelope"></i></span>
				</div>
  				<input type="email" name="email"  id="email" class="form-control input-group" placeholder="Enter Email." >
  			</div>

  			<div class="input-group mt-3">
  				<div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-lock"></i></span>
				</div>
  				<input type="password" name="password" id="password" class="form-control input-group" placeholder="Enter Password." >
  			</div>

          <div class="input-group mt-3">
  				<div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-lock"></i></span>
				</div>
  				<input type="password" name="compassword" id="compassword" class="form-control input-group" placeholder="Comfirm Password." >
  			</div>

        <div class="input-group mt-3">
  				<div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-calendar-alt"></i></span>
				</div>
  				<input type="date" name="date" id="date" class="form-control input-group" placeholder="Enter Date." >
  			</div>

  			<div >
  				<button type="submit" class=" mt-3 pb-4"
        name="regAdmin" id="regAdmin"  style="border-radius:10px;"><i class="fa fa-user-plus"></i>
  					Register
  				</button>


  			</div>
  		</form>
  	</div>

  </div>

</div>
<!-- /#page-content-wrapper -->


</div>
<!-- /#wrapper -->


<?php
include_once('scripts.php');

 ?>

<footer class="sticky-footer">
  <div class="container my-auto">
    <div class="copyright text-center my-auto">
      <small>Science  Secondary School Birnin Gwari Fees Payment System Developed By: Aminu Hassan. Copyright © Reserved 2019</small>
    </div>
  </div>
</footer>


	</body>
<script>
	// function registerAdmin(){
	// 	var ad = "page=registerAdmin&"+$('#regAdminForm').serialize();
  //
  //
	// 	$.ajax({
	// 		type: 'POST',
	// 		url: 'processAdmin.php',
	// 		data: ad,
	// 		success:function(result){
	// 			$('#fbMSG').html(result);
  //
  //
	// 		},
  //
	// 	});
	// }
</script>
<script src="bootstrap4/js/bootstrap.js"></script>
</html>
