<?php
include_once('connection.php');

/***************************************/
/******function validate input data*****/
/***************************************/
	function validate_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
		}


	
		if ( empty($_POST['pname']) || 			empty($_POST['prelation']) ||  		empty($_POST['pphone']) || 			empty($_POST['amount']) ||
			empty($_POST['pdate']) || empty($_POST['offlineref']) || 	empty($_POST['student_id'])) {

		  	echo = '<div class="alert alert-danger">All fields are required!</div>';
		  }else {
			    $pname = validate_input($_POST['pname']);
				$prelation = validate_input($_POST['prelation']);
				$pphone = validate_input($_POST['pphone']);
				$student_id = validate_input($_POST['student_id']);
				$amount = validate_input($_POST['amount']);
				$pdate = validate_input($_POST['pdate']);
				$offlineref = validate_input($_POST['offlineref']);


				$sql = "insert into fees values('','$pname','$prelation ','$pphone', '$amount','$pdate','$offlineref','$student_id')";
					$results = mysqli_query($conn, $sql);
				if ($results==1) {

					echo '<div class="alert alert-success">Payment successful!</div>';
					$query = "update student set fees_status = 'paid' where sid= $student_id";
					$result = mysqli_query($conn, $query);



			}else {
				echo = '<div class="alert alert-danger">Payment unsuccessful, try again!</div>';
			}
		}
		




?>