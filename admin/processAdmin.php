<?php
include_once('../connection.php');

$page  = $_POST['page'];

/*****************************/
/***function for validation***/
/*****************************/
function validate_input($data) {
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}

/*****************************/
/*******register admin**********/
/*****************************/
if($page == 'registerAdmin'){

/*****************************/
/*******validating input******/
/*****************************/
  if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['username']) || empty($_POST['password']) || empty($_POST['compassword'])|| empty($_POST['date'])){
    echo'<div class=" alert alert-danger"> All field are required</div>';
  }
  else if($_POST['password'] != $_POST['compassword']) {
    echo'<div class=" alert alert-danger"> Passwords not match!</div>';
  }else {
    $name = validate_input($_POST['name']);
    $username = validate_input($_POST['username']);
    $email = validate_input($_POST['email']);
    $password = validate_input($_POST['password']);
    $compassword = validate_input($_POST['compassword']);
    $date = validate_input($_POST['date']);

    $query = "INSERT INTO admin_users VALUES('','$username','$name', '$email', '$password','$date')";


    $result = mysqli_query($conn, $query);
    if ($result == 1){
      echo'<div class=" alert alert-success" > Admin registered successfully</div';
    }else{

    echo'<div class=" alert alert-danger" > Failed to add admin, try again!</div';

    }
  }
}

/*****************************/
/****display admin members****/
/*****************************/
   else if($page == 'viewAdmins'){

	$query= "SELECT * FROM admin_users";
    $result = mysqli_query($conn, $query);
	if(mysqli_num_rows($result)>0){
		echo '

		<table id="example1 example2" class="table table-striped table-bordered table-hover table-responsive">
			  <thead>
			  <tr>
				  <th>S/N</th>
				  <th>Name</th>
          <th>Username</th>
				  <th>Email</th>
				  <th>Registered Date</th>
           <th colspan="2">Actions</th>
			  </tr>
		  </thead>';

		$n = 1;
		while($row = mysqli_fetch_array($result)){
			$data = $row[0].'*'.$row[1].'*'.$row[2].'*'.$row[3].'*'.$row[4].'*'.$row[5];
			echo '
			<tbody>
			<tr>
				 <td>'.$n.'</td>
				 <td>'.$row[1].'</td>
				 <td>'.$row[2].'</td>
				 <td>'.$row[3].'</td>
         <td>'.$row[5].'</td>
				  <td><a href="javascript:void(0)" onclick="editAdmin(\''.$data.'\')"><i class="fa fa-edit"></i></a></td>

				  <td><a href="javascript:void(0)" onclick="deleteAdmin(\''.$row[0].'\')"><i class="fa fa-trash-alt " style="color:red;"></i></a></td>
			</tr>';

		$n++;
		}
		echo'</tbody>
		</table>';
	}
}

/*****************************/
/*******update admin**********/
/*****************************/

else if ($page == 'updateAdmin') {

    $id = $_POST['id'];
    $name = validate_input($_POST['name']);
    $username = validate_input($_POST['username']);
    $email = validate_input($_POST['email']);
    $pass = validate_input($_POST['password']);
	$date = validate_input($_POST['date']);
  $password = md5($pass);

	  $query = "UPDATE admin_users SET Name='$name', Username='$username', Email ='$email', Password ='$password', RegDate = $date WHERE Id = '$id'";


	  $result = mysqli_query($conn, $query);
		if ($result == 1){
		echo '<div class=" alert alert-success" > Admin updated Successfully.</div';
		}else{

	  echo '<div class=" alert alert-danger" > Failed to update admin, try again!</div';

	  }
}


/*****************************/
/*******delete admin**********/
/*****************************/
else if ($page == 'deleteAdmin') {
	$id = $_POST['id'];

	$result = mysqli_query($conn, "DELETE FROM admin_users WHERE Id = '$id'");
	if ($result ==1){
		echo '<div class=" alert alert-success" > Admin deleted Successfully.</div';
	}else{
		echo '<div class=" alert alert-danger" > Failed to delete admin, try again!</div';
	}
}










?>
