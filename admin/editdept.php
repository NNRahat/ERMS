<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
//error_reporting(0);
if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
  } else{


if(isset($_POST['submit']))
  {
    $eid=$_GET['editid'];
    $Designation=$_POST['Designation'];
    $Department=$_POST['Department'];
    $Salary=$_POST['Salary'];
    $query=mysqli_query($con, "update department set Designation='$Designation',  Department ='$Department', Salary ='$Salary' where ID='$eid'");
    if ($query) {
        echo "<script>alert('Updated Successfully');</script>";
        echo "<script>window.location.href='Department.php'</script>";
  }
  else
    {
      $msg="Something Went Wrong. Please try again.";
    }
  }
  ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Edit Employee Expirence</title>

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
          <h1 class="h3 mb-4 text-gray-800">Edit Department Details</h1>

<p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>

<form class="user" method="post" action="">
  <?php
 $aid=$_GET['editid'];
$ret=mysqli_query($con,"select * from department where ID='$aid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
               <div class="row">
                <div class="col-4 mb-3">Designation</div>
                   <div class="col-8 mb-3">   <input type="text" class="form-control form-control-user" id="Designation" name="Designation" aria-describedby="emailHelp" value="<?php  echo $row['Designation'];?>"></div>
                    </div>
                    <div class="row">
                      <div class="col-4 mb-3">Department</div>
                     <div class="col-8 mb-3">  <input type="text" class="form-control form-control-user" id="Department" name="Department" aria-describedby="emailHelp" value="<?php  echo $row['Department'];?>"></div>
                     </div>
                    <div class="row">
                    <div class="col-4 mb-3">Salary</div>
                    <div class="col-8 mb-3">
                      <input type="text" class="form-control form-control-user" id="Salary" name="Salary" aria-describedby="emailHelp" value="<?php  echo $row['Salary'];?>"></div>
                    </div>

 
                    
<?php } ?>
                    <div class="row" style="margin-top:4%">
                      <div class="col-4"></div>
                      <div class="col-4">
                      <input type="submit" name="submit"  value="Update" class="btn btn-primary btn-user btn-block">
                    </div>
                    </div>

                  </form>





        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
           <div class="container my-auto">
             <div class="copyright text-center my-auto">
               <span>Group: Nurnabi Rahat, Ashikuzzaman Nayem, A.K.M Asif Mahmud</span>
             </div>
           </div>
         </footer>
   <?php// include('includes/footer.php');?>
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

</body>

</html>
<?php }  ?>
