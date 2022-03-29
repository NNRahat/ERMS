<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
//error_reporting(0);
if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
  } else{


    include('includes/delid.php');

  ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Employees Details</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">
  <link href="../css/sb-admin-2.css" rel="stylesheet">

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
          <h1 class="h3 mb-4 text-gray-800">Employees Details</h1>

<p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
  

<div class="table-responsive">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

    <tr>
        <th>S no.</th>
        <th>ID</th>
        <th>Name</th>
        <th>Designation</th>
        <th>Department</th>
        <th>Email</th>
        <th>Contact no</th>
        <th>Joining Date</th>
        <th>Salary</th>
        <th>Action</th>

    </tr>

<?php
$eid=$_SESSION['tid'];
$ret=mysqli_query($con,"Select employee.EmpEmail,employeedetail.*,department.* From employeedetail
  INNER JOIN employee ON employeedetail.EdID=employee.EmpID
  INNER JOIN department ON employeedetail.Designation=department.Designation
  where employeedetail.EdID = ANY(select EdID from employeedetail where EmpFname='$eid')");
$cnt=1;

while ($row=mysqli_fetch_array($ret)) {

?>

    <tr>
    <td><?php echo $cnt;?></td>
    <td><?php  echo $row['EdID'];?></td>
    <td><?php echo $row['EmpFname']." ".$row['EmpLName'];?></td>
    <td><?php echo $row['Designation'];?></td>
    <td><?php echo $row['Department'];?></td>
    <td><?php echo $row['EmpEmail'];?></td>
    <td><?php echo $row['EmpContactNo'];?></td>
    <td><?php echo $row['EmpJoingdate'];?></td>
    <td><?php echo $row['Salary'];?></td>
    <td><a href="viewdetails.php?editid=<?php echo $row['EdID'];?>">View All Details</a> |
        <a href="editempprofile.php?editid=<?php echo $row['EdID'];?>">Edit Profile Details</a> |
        <a href="editempeducation.php?editid=<?php echo $row['EdID'];?>">Edit Education Details</a> |
        <a href="editempexp.php?editid=<?php echo $row['EdID'];?>">Edit Experience Details</a>  |
        <a href="allemployees.php?delid=<?php echo $row['EdID'];?>" onclick="return confirm('Do you really want to delete');" style="color:red">Delete</a>
    </td>
    </tr>

<?php
$cnt=$cnt+1;
}?>

</table>

</div>
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

  <!-- Page level plugins -->
  <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../js/demo/datatables-demo.js"></script>
</body>

</html>
<?php }  ?>
