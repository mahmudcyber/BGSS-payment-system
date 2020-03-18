	<?php
	session_start();
	include_once('header.php');

	// if (!isset($_SESSION['admin'])) {
	//   header('Location:../login.php');
	// }


	 ?>
	  <div class="container-fluid">
		<h1 class="mt-4">Science Secondary School Birning Gwari Payments System</h1>
		  <hr class="color_line">
	   <div>

		   <!--************Admin members Table**************-->

		   <div class="row">
			<div class="col-md-8 shadow ">
				<h4>Admin Members</h4>
				<div id="dfbMSG"></div>
				  <div id="displayAmins" class="table ">
				  </div>
			   </div>


	<!--************Admin registering form*************-->

		<div class="col-md-4 shadow" >

			 <h4 >Register Admin</h4>
			 <hr class="color_line">
			 <form role="form" id="regAdminForm"  >
				 <div id="fbMSG"></div>

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

				 <div class="button" id="regAdmin1">
					 <button type="button" class=" mt-3 mb-4"
					name="regAdmin" id="regAdmin" onclick="registerAdmin()" style="border-radius:10px;"><i class="fa fa-user-plus"></i>
						 Register
					 </button>


				 </div>
			 </form>

			</div>
		   </div>



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
/*************************************/
/***********datatable*****************/
/*************************************/

      $(function () {
        $("#example2").DataTable();
        $('#example1').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": true
        });
      });


/*************************************/
/***********register admin*****************/
/*************************************/

	function registerAdmin(){
		var ad = "page=registerAdmin&"+$('#regAdminForm').serialize();


		$.ajax({
			type: 'POST',
			url: 'processAdmin.php',
			data: ad,
			success:function(result){
				$('#fbMSG').html(result);


			},

		});
	}

/*************************************/
/***********view admin*****************/
/*************************************/

		function viewAdmins(){
			var ad = "page=viewAdmins";
			$.ajax({
				type: 'POST',
				url: 'processAdmin.php',
				data: ad,
				success: function(result){
					$('#displayAmins').html(result);
				},

			});
		}

/*************************************/
/***********edit admin********/
/*************************************/

		function editAdmin(a){
			var ad=a.split('*');
			var id = ad[0];
			var name = ad[1];
			var username = ad[2];
			var email = ad[3];
			var password= ad[4];
			var date= ad[5];
			document.getElementById('name').value=name;
			document.getElementById('username').value=username;
			document.getElementById('email').value=email;
			document.getElementById('password').value=password;
			document.getElementById('compassword').value=password;
			document.getElementById('date').value=date;

			$('#regAdmin1').html('<button type="button" id="updateAdmin1" name="updateAdmin1" class="mt-3 mb-4" onclick="updateAdmin('+id+')" style="border-radius:10px;"><i class="fa fa-user-plus"></i>Update</button>');


		}

/*************************************/
/***********update admin*****************/
/*************************************/


			function updateAdmin(a){
			var ad = "page=updateAdmin&id="+a+"&name="+$('#name').val()+"&username="+$('#username').val()+"&email="+$('#email').val()+"&password="+$('#password').val()+"&date="+$('#date').val();

			$.ajax({
			type: 'POST',
			url: 'processAdmin.php',
			data: ad,
			success:function(result){
				$('#fbMSG').html(result);
				viewAdmins();


			},

		});
	}

/*************************************/
/***********delete admin*****************/
/*************************************/

		function deleteAdmin(a){
			var ad = "page=deleteAdmin&id="+a;
			var result = confirm("Are you sure you want to remove this Admin?");
			if(result){
				$.ajax({
				type: 'POST',
				url: 'processAdmin.php',
				data: ad,
				success: function(result){

					$('#dfbMSG').html(result);
					viewAdmins();
					},

				});

			}

		}

			

		viewAdmins();

	</script>
	<script src="bootstrap4/js/bootstrap.js"></script>
	<script type="text/javascript" src="js/jquery1.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/bootstrap-datetimepicker.min.js"></script>
	<script src="datatables/jquery.dataTables.min.js"></script>
	<script src="datatables/dataTables.bootstrap.min.js"></script>
	<script>
	</html>
