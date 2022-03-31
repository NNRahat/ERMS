<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
//error_reporting(0);
if (strlen($_SESSION['uid']==0)) {
  header('location:logout.php');
  } else{


if(isset($_POST['submit']))
  {

    $eid=$_SESSION['uid'];
    $FName=$_POST['FirstName'];
    $LName=$_POST['LastName'];
    $EdID=$_POST['EdID'];
    $EmpDept=$_POST['EmpDept'];
    $Designation=$_POST['Designation'];
    $EmpContactNo=$_POST['EmpContactNo'];
    $Email=$_POST['Email'];
    $Birthdate=$_POST['Birthdate'];
    $gender=$_POST['gender'];
    $empjdate=$_POST['EmpJoingdate'];
    $query=mysqli_query($con, "update employeedetail,employee set EmpFname='$FName',  EmpLName='$LName', 
    Designation='$Designation', EmpContactNo='$EmpContactNo',EmpEmail='$Email',BirthDate='$Birthdate', 
    EmpGender='$gender',EmpJoingdate='$empjdate' where EdID='$eid' and EmpID='$eid'");
    if ($query) {
    $msg="Your profile has been updated.";
  }
  else
    {
      $msg1="Something Went Wrong. Please try again.";
    }
  }
  ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>My Profile</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

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
          <h1 class="h3 mb-4 text-gray-800">My Profile</h1>

<p style="font-size:16px; color:green" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
<p style="font-size:16px; color:red" align="center"> <?php if($msg){
      echo $msg1;
    }  ?> </p>

<form class="user" method="post" action="">
  <?php
$eid=$_SESSION['uid'];
$ret=mysqli_query($con,"Select employee.EmpEmail,employeedetail.*,department.* From employee 
INNER JOIN employeedetail ON employee.EmpID=employeedetail.EdID
INNER JOIN department ON employeedetail.Designation=department.Designation
where employee.EmpID='$eid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
    <div class="row">
        <div class="col-4 mb-3">First Name</div>
        <div class="col-8 mb-3">   <input type="text" class="form-control form-control-user" id="FirstName" name="FirstName" aria-describedby="emailHelp" required="true" value="<?php  echo $row['EmpFname'];?>"></div>
    </div>
    <div class="row">
      <div class="col-4 mb-3">Last Name </div>
      <div class="col-8 mb-3">  <input type="text" class="form-control form-control-user" id="LastName" name="LastName" aria-describedby="emailHelp" required="true" value="<?php  echo $row['EmpLName'];?>"></div>
    </div>
    <div class="row">
        <div class="col-4 mb-3">Employee Code </div>
        <div class="col-8 mb-3">
        <input type="text" class="form-control form-control-user" id="EdID" name="EdID" aria-describedby="emailHelp" required="true" value="<?php  echo $row['EdID'];?>" readonly="true"></div>
</div>
    <div class="row">
          <div class="col-4 mb-3">Employee Dept</div>
          <div class="col-8 mb-3">
          <input type="text" class="form-control form-control-user" id="EmpDept" name="EmpDept" aria-describedby="emailHelp" required="true" value="<?php  echo $row['Department'];?>" readonly="true"></div>    
    </div>
    <div class="row">
        <div class="col-4 mb-3">Employee Desigantion</div>
        <div class="col-8 mb-3">
                      <input type="text" class="form-control form-control-user" id="Designation" name="Designation" aria-describedby="emailHelp" required="true" value="<?php  echo $row['Designation'];?>" readonly="true">
    </div></div>
                    <div class="row">
                      <div class="col-4 mb-3">Employee Contact No.</div>
                    <div class="col-8 mb-3">
                      <input type="text" class="form-control form-control-user" id="EmpContactNo" name="EmpContactNo" aria-describedby="emailHelp" required="true" value="<?php  echo $row['EmpContactNo'];?>">
                    </div></div>
                    <div class="row">
                    <div class="col-4 mb-3">Email</div>
                   <div class="col-8 mb-3">
                      <input type="email" class="form-control form-control-user" id="Email" name="Email" aria-describedby="emailHelp" placeholder="Enter Email Address..." required="true" value="<?php  echo $row['EmpEmail'];?>" ><!-- readonly="true" -->
                    </div></div>

                    <div class="row">
                      <div class="col-4 mb-3">Salary</div>
                      <div class="col-8 mb-3">
                      <input type="text" class="form-control form-control-user" id="salary" name="salary" aria-describedby="emailHelp" required="true" value="<?php  echo $row['Salary'];?>" readonly="true">
                    </div></div>
                    <div class="row">
                      <div class="col-4 mb-3">Employee Joing Date(yyyy-mm-dd)</div>
                    <div class="col-8  mb-3">
                      <input type="text" class="form-control form-control-user" value="<?php  echo $row['EmpJoingdate'];?>" id="jDate" name="EmpJoingdate" aria-describedby="emailHelp">
                    </div></div>
                    <div class="row">
                      <div class="col-4 mb-3">Gender</div>
                    <div class="col-4 mb-3">

<?php if($row['EmpGender']=="Male")
{?>
                      <input type="radio" id="gender" name="gender" value="Male" checked="true">Male

                     <input type="radio" name="gender" value="Female">Female
                   <?php }   else if($row['EmpGender']=="Female") {?>
 <input type="radio" id="gender" name="gender" value="Male" >Male
  <input type="radio" name="gender" value="Female" checked="true">Female
                   <?php } else { ?>
 <input type="radio" id="gender" name="gender" value="Male" >Male
  <input type="radio" name="gender" value="Female">Female
                   <?php } ?>
                    </div></div>
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
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
  <script type="text/javascript">
    $(".jDate").datepicker({
    format: 'yyyy-mm-dd',
    autoclose: true
}).datepicker("update", "10/10/2016");
  </script>

</body>

</html>
<?php }  ?>
