<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
//error_reporting(0);
// if (strlen($_SESSION['aid']==0)) {
//   header('location:logout.php');
//   } else{
  
  

if(isset($_POST['submit'])){
    $Empid=$_POST['Empid'];
    $Email=$_POST['Email'];
    $Password=$_POST['Password'];
    $RepeatPassword=$_POST['RepeatPassword'];
    $ret1=mysqli_query($con, "select EmpEmail from employee where EmpEmail='$Email'");
    $ret2=mysqli_query($con, "select EmpID from employee where EmpID='$Empid'");
    $result1=mysqli_fetch_array($ret1);
    $result2=mysqli_fetch_array($ret2);
    if($result1>0 && $result2>0){
      $msg1="The Email and Employee ID both already associated with another account";     
    }
    else if($result2>0){
      $msg1="This Employee ID already associated with another account";
    }
    else if($result1>0){
      $msg1="This email already associated with another account";
    }
    else{
    $query=mysqli_query($con, "insert into employee(EmpID,EmpEmail,EmpPassword) 
    value('$Empid','$Email','$Password')" );
    if ($query) { 
      $msg1="New employee added";
      header('location:addnewemp2nd.php'); 
  }else
    {
      $msg="Something Went Wrong. Please try again.";
    }
  }
}
  ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Add a new employee</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">
<script type="text/javascript">
function checkpass()
{
if(document.details.Password.value!=document.details.RepeatPassword.value)
  {
  alert('New Password and Confirm Password field does not match');
  // document.register.RepeatPassword;
  return false;
  }else{
     return true;
  }
 
}

</script>
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
          <h1 class="h3 mb-4 text-gray-800">Add a new employee</h1>

<p style="font-size:16px; color:green" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
  <p style="font-size:16px; color:green" align="center"> <?php if($msg1){
    echo $msg1;
  }  ?> </p>

                <form class="user" name="details" method="post" action="" onsubmit="return checkpass();" >
                
                  <div class="row">
                      <div class="col-4 mb-3">Employee ID</div>
                    <div class="col-8 mb-3">
                      <input type="text" class="form-control form-control-user" id="Empid" name="Empid" aria-describedby="emailHelp" value=""  required="true">
                    </div></div>
                  <div class="row">
                      <div class="col-4 mb-3">Email</div>
                    <div class="col-8 mb-3">
                      <input type="email" class="form-control form-control-user" id="Email" name="Email" aria-describedby="emailHelp" value=""  required="true">
                  </div></div>
                    <div class="row">
                  <div class="col-4 mb-3">Password</div>
                  <div class="col-8 mb-3">   <input type="text" class="form-control form-control-user" id="Password" name="Password" aria-describedby="emailHelp" value=""  required="true" ></div>
                    </div>  
                    <div class="row">
                      <div class="col-4 mb-3">Repeat Password</div>
                    <div class="col-8 mb-3">  <input type="text" class="form-control form-control-user" id="RepeatPassword" name="RepeatPassword" aria-describedby="emailHelp" value=""  required="true"></div>  
                    </div>
                      <div class="row" style="margin-top:4%">
                      <div class="col-4"></div>
                      <div class="col-4">
                      <input type="submit" name="submit"  value="Next" class="btn btn-primary btn-user btn-block">
                    </div>
                    </div>
                  
                  </form>





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

</body>

</html>
<?php //}  ?>
