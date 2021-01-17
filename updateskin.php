<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
<?php
// Kết nối Database
include 'config.php';
$id=$_GET['id'];
$query=mysqli_query($conn,"select * from `skin` where idskin='$id'");
$row=mysqli_fetch_assoc($query);
?>

<div class="wrapper">
    <div class="container-fluid">
         <div class="row">
            <div class="col-md-12">
                    <div class="page-header">
                        <h2>Sửa năm học</h2>
                    </div>
                    <p>Thêm gì đó vào</p>
                   <form method="POST" class="form">
                        <div>
                            <label class="form-group">Name: <input type="text" value="<?php echo $row['nameskin']; ?>" name="username" class="form-control"></label><br/>
                        </div>
                        <div>
                            <label class="form-group">Nội dung <input type="text" value="<?php echo $row['noidung']; ?>" name="email" class="form-control"></label><br/>
                        </div>
                        <div>
                            <label class="form-group">Phần trăm <input type="text" value="<?php echo $row['phantram']; ?>" name="phone" class="form-control"></label><br/>
                        </div>
                       




                        <input type="submit" value="Update" name="update_user">
                        <a href="displayedu.php" class="btn btn-default">Cancel</a>
                    </form>
            </div>
         </div>        
    </div>
</div>





<?php

if (isset($_POST['update_user'])){
$id=$_GET['id'];
$username=$_POST['username'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$end=$_POST['end'];
 
// Create connection
$connn = new mysqli("localhost", "root", "", "btl2");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $connn->connect_error);
}
 
$sql = "UPDATE `skin` SET nameskin='$username', noidung='$email', phantram='$phone' WHERE idskin='$id'";
 
if ($connn->query($sql) === TRUE) {
  // echo "Record updated successfully";
  header("location: displayskin.php");
  exit();
} else {
echo "Error updating record: " . $connn->error;
}
 
$connn->close();
}
?>


</body>
</html>