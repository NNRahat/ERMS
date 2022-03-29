<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_GET['delid'])){
        $eid=$_GET['delid'];
        $query=mysqli_query($con,"delete from department
        where ID='$eid'");
        echo "<script>alert('Record Deleted successfully');</script>";
        echo "<script>window.location.href='Department.php'</script>";
    }
    if(isset($_POST['submit'])){
        header('location:Addnewdept.php');
    }
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
          <h1 class="h3 mb-4 text-gray-800">Department</h1>

<p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
  
    <form class="user" method="post" action="">
                <div class="row" align="center">
                    <div class="col-5 mb-2"><b></b></div>
                    <div class="col-4 mb-2">   
                    
                    </div>
                    <div class="col-3 mb-2">   
                        <input type="submit" name="submit" value="Add New Deignation" class="btn btn-primary btn-user btn-block">
                    </div>
                </div>
                <hr>


</form>
<div class="table-responsive">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
<tr>
    <th>S no.</th>
    <th>Designation</th>
    <th>Department</th>
    <th>Salary</th>
    <th>Action</th>
</tr>
<?php
$ret=mysqli_query($con,"Select * From department ORDER BY Department ASC;");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {
?>
<tr>
    <td><?php echo $cnt;?></td>
    <td><?php echo $row['Designation'];?></td>
    <td><?php echo $row['Department'];?></td>
    <td><?php echo $row['Salary'];?></td>
    <td><a href="editdept.php?editid=<?php echo $row['ID'];?>">Edit</a> |
        <a href="Department.php?delid=<?php echo $row['ID'];?>" onclick="return confirm('Do you really want to delete');" style="color:red">Delete</a>
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
