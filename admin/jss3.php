<?php
include_once('../connection.php');
include_once('header.php');
$err = "";
$query =  "SELECT * FROM student  where class = 'jss3'";
$result = mysqli_query($conn, $query);

 ?>
  <div class="container-fluid">
    <h1 class="mt-4">Science Secondary School Birning Gwari Payments System</h1>
	  <hr class="color_line">
    <div class="row">
      <h3>JSS2 Payments Records</h3>
      <?php echo $err; ?>
		<div class="table-responsive">
      <table  class="table table-striped table-bordered table-hover" id="example2" style="font-size: 14px;">
		  <thead>
			  <tr>
          <td>S/N</td>
          <td>Student ID</td>
          <td>First Name</td>
          <td>Middle Name</td>
          <td>Last Name</td>
          <td>Email</td>
          <td>Phone Number</td>
          <td>Class</td>
          <td>Date of Birth</td>
          <td>Register date</td>

          <td>Fess Status</td>
			  </tr>
		  </thead>
		  <tbody>
        <?php
        $sn = 1;
        if(mysqli_num_rows($result)>0){
          while ($row = mysqli_fetch_assoc($result)) { ?>

        <tr>
          <td><?php echo $sn;?></td>
          <td><?php echo $row['student_id']?></td>
          <td><?php echo $row['fname']?></td>
          <td><?php echo $row['mname']?></td>
          <td><?php echo $row['lname']?></td>
          <td><?php echo $row['email']?></td>
          <td><?php echo $row['phone_no']?></td>
          <td><?php echo $row['class']?></td>
          <td><?php echo $row['dob']?></td>
          <td><?php echo $row['reg_date']?></td>
    
          <td><?php echo $row['fees_status']?></td>
        </tr>
      <?php $sn++;}} else{
        $err = '<div class="alert alert-danger">NO record found!</div>';
      }?>
		  </tbody>
		</table>
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
<script src="bootstrap4/js/bootstrap.js"></script>

<!----data table---->
<script type="text/javascript" src="js/jquery1.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/bootstrap-datetimepicker.min.js"></script>
<script src="datatables/jquery.dataTables.min.js"></script>
<script src="datatables/dataTables.bootstrap.min.js"></script>

<script>
      $(document).ready(function () {
        $("#example2").DataTable();
      });
    </script>

</html>
