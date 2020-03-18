<?php
include_once('../connection.php');
include_once('header.php');

/******************************************/
/**************take user back to loging page
 if attempt accessing page
  without authentication******************/
  /******************************************/
// if (!isset($_SESSION['user'])) {
//   header('Location:../alogin.php');
// }




 ?>
<style>
	.card{
		background-color: #8b4513;
		width: 100%;
		height: 150px;
		margin-bottom: 60px;
		
	}
	h5, .fa{
		
		text-align: center;
		font-weight: bold;
	}
	a:hover{
		text-decoration: none;
	}
</style>

  <div class="container-fluid">
    <h1 class="mt-4">Science Secondary School Birning Gwari Payments System</h1>
	  <hr class="color_line">

    <div class="row shadow">
      <div class="col-lg-4">
     	<div class="card">
			<div class="card-body shadow ">
				<a href="ss3.php">
					<h5 style="color:white">
					<i class="fa fa-dollar-sign fa-4x ">
						</i><div>SS3 Payment Records</div>
					
					</h5>
				</a>
				
			</div>
    	</div>
    </div>
	<div class="col-lg-4">
     	<div class="card">
			<div class="card-body shadow">
				<a href="ss2.php">
					<h5 style="color:white">
					<i class="fa fa-dollar-sign fa-4x ">
						</i><div>	SS2 Payment Records</div>
					
					</h5>
				</a>
			</div>
    	</div>
    </div>
	<div class="col-lg-4">
     	<div class="card">
			<div class="card-body shadow">
				<a href="ss1.php">
					<h5 style="color:white">
				<i class="fa fa-dollar-sign fa-4x ">
						</i><div>	SS1 Payment Records</div>
				
					</h5>
				</a>
			</div>
    	</div>
	</div>
	<div class="col-lg-4">
     	<div class="card">
			<div class="card-body shadow">
				<a href="ss2.php">
					<h5 style="color:white">
				<i class="fa fa-dollar-sign fa-4x">
						</i><div>	JSS3 Payment Records</div>
				
					</h5>
				</a>
			</div>
    	</div>
    </div>
	<div class="col-lg-4">
     	<div class="card">
			<div class="card-body shadow">
				<a href="ss2.php"><h5 style="color:white">
				<i class="fa fa-dollar-sign fa-4x">
					</i><div>	JSS2 Payment Records</div>
				
					</h5>
				</a>
			</div>
    	</div>
    </div>
	<div class="col-lg-4">
     	<div class="card">
			<div class="card-body shadow">
				<a href="ss2.php"><h5 style="color:white">
				<i class="fa fa-dollar-sign fa-4x">
					
					</i><div>JSS1 Payment Records</div>
					</h5>
				</a>
			</div>
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
include_once('footer.php');
 ?>
