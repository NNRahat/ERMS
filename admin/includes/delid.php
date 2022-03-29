<?php
if(isset($_GET['delid']))
      {
        $eid=$_GET['delid'];
        $query=mysqli_query($con,"delete employee,employeedetail,empexpireince,empeducation from employeedetail
    left join empexpireince on empexpireince.ExpID=employeedetail.EdID
    left join empeducation on empeducation.EduID=employeedetail.EdID
    left join employee on employee.EmpID=employeedetail.EdID
    where employeedetail.EdID='$eid'");
        echo "<script>alert('Record Deleted successfully');</script>";
        echo "<script>window.location.href='allemployees.php'</script>";
      }
?>