<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
//error_reporting(0);
if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
  } else{

  ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>All details</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
  <?php include_once('includes/sidebar.php')?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
         <?php include_once('includes/header.php')?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><b>Details</b></h1>

<p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>

  <?php
$aid=$_GET['editid'];
// $query=mysqli_query($con,"select * from empexpireince where EmpID=$aid");
$query=mysqli_query($con,"Select employee.EmpEmail,empexpireince.*,employeedetail.*,empeducation.*,department.* From employee 
INNER JOIN empexpireince ON employee.EmpID=empexpireince.ExpID
INNER JOIN employeedetail ON employee.EmpID=employeedetail.EdID
INNER JOIN empeducation ON employee.EmpID=empeducation.EduID
INNER JOIN department ON employeedetail.Designation=department.Designation
where employee.EmpID='$aid'"); 
$row=mysqli_fetch_array($query);
if($row>0)
{
$fname=$row['EmpFname'];
$lname=$row['EmpLName'];
?>
<table class="table table-bordered" id="dataTable" table-layout="fixed" width="100%" cellspacing="50">
  <p style="font-size:22px; color:MediumPurple" ><b>Profile</b></p>
<tr>
  <th style="width:50%;">ID</th>
  <td><?php echo $row['EdID'];?></td>
</tr>
<tr>
  <th>Name</th>
  <td><?php echo $fname." ".$lname;?></td>
</tr>
<tr>
  <th>Email</th>
  <td><?php echo $row['EmpEmail'];?></td>
</tr>
<tr>
  <th>Designation</th>
  <td><?php echo $row['Designation'];?></td>
</tr>
<tr>
  <th>Department</th>
  <td><?php echo $row['Department'];?></td>
</tr>
<tr>
  <th>Salary</th>
  <td><?php echo $row['Salary'];?></td>
</tr>
<tr>
  <th>Contact No.</th>
  <td><?php echo $row['EmpContactNo'];?></td>
</tr>
<tr>
  <th>Gender</th>
  <td><?php echo $row['EmpGender'];?></td>
</tr>
<tr>
  <th>Joining Date</th>
  <td><?php echo $row['EmpJoingdate'];?></td>
</tr>


</table>

<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
<p style="font-size:22px; color:MediumPurple" ><b>Experience</b></p>
<tr>
  <th style="width:50%;">First Company</th>
  <td><?php echo $row['Employer1Name'];?></td>
</tr>
<tr>
  <th>First Company Designation</th>
  <td><?php echo $row['Employer1Designation'];?></td>
</tr>
<tr>
  <th>First Company CTC</th>
  <td><?php echo $row['Employer1CTC'];?></td>
</tr>
<tr>
  <th>First Company Work Duration</th>
  <td><?php echo $row['Employer1WorkDuration'];?></td>
</tr>
<tr>
  <th>Second Company</th>
  <td><?php echo $row['Employer2Name'];?></td>
</tr>
<tr>
  <th>Second Company Designation</th>
  <td><?php echo $row['Employer2Designation'];?></td>
</tr>
<tr>
  <th>Second Company CTC</th>
  <td><?php echo $row['Employer2CTC'];?></td>
</tr>
<tr>
  <th>Second Company Work Duration</th>
  <td><?php echo $row['Employer2WorkDuration'];?></td>
</tr>

</table>
<p style="font-size:22px; color:MediumPurple" ><b>Educational Qualification</b></p>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
<tr>
  <th style="width:50%;">Graduation Course Name</th>
  <td><?php echo $row['CourseGra'];?></td>
</tr>
<tr>
  <th>Graduate Institution</th>
  <td><?php echo $row['SchoolCollegeGra'];?></td>
</tr>
<tr>
  <th>Year of Passing in Graduation</th>
  <td><?php echo $row['YearPassingGra'];?></td>
</tr>
<tr>
  <th>Percent in Graduation</th>
  <td><?php echo $row['PercentageGra'];?></td>
</tr>
<th>SSC Course Name</th>
  <td><?php echo $row['CourseSSC'];?></td>
</tr>
<tr>
  <th>SSC School</th>
  <td><?php echo $row['SchoolCollegeSSC'];?></td>
</tr>
<tr>
  <th>Year of Passing in SSC</th>
  <td><?php echo $row['YearPassingSSC'];?></td>
</tr>
<tr>
  <th>Percent in SSC</th>
  <td><?php echo $row['PercentageSSC'];?></td>
</tr>
<th>HSC Course Name</th>
  <td><?php echo $row['CourseHSC'];?></td>
</tr>
<tr>
  <th>HSC College</th>
  <td><?php echo $row['SchoolCollegeHSC'];?></td>
</tr>
<tr>
  <th>Year of Passing in HSC</th>
  <td><?php echo $row['YearPassingHSC'];?></td>
</tr>
<tr>
  <th>Percent in HSC</th>
  <td><?php echo $row['PercentageHSC'];?></td>
</tr>


</table>


<?php }?>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
   <?php include_once('includes/footer.php');?>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>



  <!-- Bootstrap core JavaScript-->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin-2.min.js"></script>
  <script type="text/javascript">
    $(".jDate").datepicker({
    format: 'yyyy-mm-dd',
    autoclose: true
}).datepicker("update", "10/10/2016");
  </script>
<script src="../vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../js/demo/datatables-demo.js"></script>
</body>

</html>
<?php }  ?>
