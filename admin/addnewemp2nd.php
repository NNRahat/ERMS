<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
//error_reporting(0);
// if (strlen($_SESSION['aid']==0)) {
//   header('location:logout.php');
//   } else{
  
  

if(isset($_POST['submit']))
  {
   
    $Empid=$_POST['Empid'];
    $FName=$_POST['FirstName'];
    $LName=$_POST['LastName'];
    $Designation=$_POST['Designation'];
    $EmpContactNo=$_POST['EmpContactNo'];
    $gender=$_POST['gender'];
    $empBirth=$_POST['EmpBirth']; 
    $empjdate=$_POST['EmpJoingdate']; 
    $query=mysqli_query($con, "insert into employeedetail(EmpFname, EmpLName, EdID,Designation,BirthDate, EmpContactNo, EmpGender,EmpJoingdate) value('$FName', '$LName', '$Empid','$Designation','$empBirth','$EmpContactNo','$gender','$empjdate')");
     if ($query) { 
       $msg1="New employee added";
       header('location:addnewemp.php'); 
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
  <title>Add a new employee</title>

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
          <h1 class="h3 mb-4 text-gray-800">Add a new employee</h1>

<p style="font-size:16px; color:green" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
  <p style="font-size:16px; color:green" align="center"> <?php if($msg1){
    echo $msg1;
  }  ?> </p>
<?php 
  $query = mysqli_query($con,"select EmpID FROM employee ORDER BY s_no DESC limit 1");
  $row= mysqli_fetch_array($query);
?>
 <form class="user" name="details" method="post" action="">
                
                  <div class="row">
                      <div class="col-4 mb-3">Employee ID</div>
                     <div class="col-8 mb-3">
                      <input type="text" class="form-control form-control-user" id="Empid" name="Empid" aria-describedby="emailHelp" value="<?php echo $row['EmpID']; ?>"  required="true">
                    </div></div>
                     <div class="row">
                        <div class="col-4 mb-3">First Name</div>
                        <div class="col-8 mb-3">   <input type="text" class="form-control form-control-user" id="FirstName" name="FirstName" aria-describedby="emailHelp" value="" required="true"></div>
                    </div>
                    <div class="row">
                      <div class="col-4 mb-3">Last Name </div>
                     <div class="col-8 mb-3">  <input type="text" class="form-control form-control-user" id="LastName" name="LastName" aria-describedby="emailHelp" value="" required="true"></div>
                     </div>
                      <div class="row">
                    <div class="col-4 mb-3">Employee Desigantion</div>

                    <div class="col-8 mb-3">
                      <input type="text" class="form-control form-control-user" id="Designation" name="Designation" aria-describedby="emailHelp" value="" required="true">
                    </div></div>
                    
                    <div class="row">
                      <div class="col-4 mb-3">Employee Contact No.</div>
                    <div class="col-8 mb-3">
                      <input type="text" class="form-control form-control-user" id="EmpContactNo" name="EmpContactNo" aria-describedby="emailHelp" value="" required="true">
                    </div></div>
                    <div class="row">
                    <div class="col-4 mb-3">Employee Birth Date<b>(yyyy-mm-dd)</b></div>
                    <div class="col-8 mb-3">
                      <input type="text" class="form-control form-control-user" id="EmpBirth" name="EmpBirth" aria-describedby="emailHelp" value="" required="true">
                    </div></div>
                    <div class="row">
                      <div class="col-4 mb-3">Employee Joining Date<b>(yyyy-mm-dd)</b></div>
                    <div class="col-8  mb-3">
                      <input type="text" class="form-control form-control-user" value="" id="jDate" name="EmpJoingdate" aria-describedby="emailHelp" required="true">
                    </div></div>
                    <div class="row">
                      <div class="col-4 mb-3">Gender</div>
                    <div class="col-4 mb-3">

<?php if($row['EmpGender']=="Male")
{?>
                      <input type="radio" id="gender" name="gender" value="Male" checked="true">Male

                     <input type="radio" name="gender" value="Female">Female
                   <?php }  else {?>
 <input type="radio" id="gender" name="gender" value="Male" >Male
  <input type="radio" name="gender" value="Female" checked="true">Female
                   <?php }?>
                    </div></div>
 <!-- <hr>                
 <br>
 <h1 class="h3 mb-4 text-gray-800">Employees education</h1>

                    <div class="row">
                    <div class="col-4 mb-3">Year of Passing Graduation </div>
                    <div class="col-8 mb-3">
                      <input type="text" class="form-control form-control-user" id="yopgra" name="yopgra" aria-describedby="emailHelp" value="<?php // echo $row['YearPassingGra'];?>"></div>
                    </div>

                    <div class="row">
                      <div class="col-4 mb-3">Percentage in Graduation</div>
                     <div class="col-8 mb-3">
                      <input type="text" class="form-control form-control-user" id="pigra" name="pigra" aria-describedby="emailHelp" value="<?php // echo $row['PercentageGra'];?>">
                    </div></div>
                    <div class="row">
                <div class="col-4 mb-3">Course SSC</div>
                   <div class="col-8 mb-3">   <input type="text" class="form-control form-control-user" id="coursessc" name="coursessc" aria-describedby="emailHelp" value="<?php // echo $row['CourseSSC'];?>"></div>
                    </div>  
                    <div class="row">
                      <div class="col-4 mb-3">School/College SSC </div>
                     <div class="col-8 mb-3">  <input type="text" class="form-control form-control-user" id="schoolclgssc" name="schoolclgssc" aria-describedby="emailHelp" value="<?php // echo $row['SchoolCollegeSSC'];?>"></div>  
                     </div>



                    <div class="row">
                    <div class="col-4 mb-3">Year of Passing SSC </div>
                    <div class="col-8 mb-3">
                      <input type="text" class="form-control form-control-user" id="yopssc" name="yopssc" aria-describedby="emailHelp" value="<?php // echo $row['YearPassingSSC'];?>"></div>
                    </div>

                    <div class="row">
                      <div class="col-4 mb-3">Percentage in SSC</div>
                     <div class="col-8 mb-3">
                      <input type="text" class="form-control form-control-user" id="pissc" name="pissc" aria-describedby="emailHelp" value="<?php  //echo $row['PercentageSSC'];?>">
                    </div></div>
                    <div class="row">
                <div class="col-4 mb-3">Course HSC</div>
                   <div class="col-8 mb-3">   <input type="text" class="form-control form-control-user" id="coursehsc" name="coursehsc" aria-describedby="emailHelp" value="<?php // echo $row['CourseHSC'];?>"></div>
                    </div>  
                    <div class="row">
                      <div class="col-4 mb-3">School/College HSC </div>
                     <div class="col-8 mb-3">  <input type="text" class="form-control form-control-user" id="schoolclghsc" name="schoolclghsc" aria-describedby="emailHelp" value="<?php // echo $row['SchoolCollegeHSC'];?>"></div>  
                     </div>



                    <div class="row">
                    <div class="col-4 mb-3">Year of Passing HSC </div>
                    <div class="col-8 mb-3">
                      <input type="text" class="form-control form-control-user" id="yophsc" name="yophsc" aria-describedby="emailHelp" value="<?php  //echo $row['YearPassingHSC'];?>"></div>
                    </div>

                    <div class="row">
                      <div class="col-4 mb-3">Percentage in HSC</div>
                     <div class="col-8 mb-3">
                      <input type="text" class="form-control form-control-user" id="pihsc" name="pihsc" aria-describedby="emailHelp" value="<?php  //echo $row['PercentageHSC'];?>">
                    </div></div> -->

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
