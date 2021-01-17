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
$query=mysqli_query($conn,"select * from `signup` where idup='$id'");
$row=mysqli_fetch_assoc($query);
?>

<div class="wrapper">
    <div class="container-fluid">
         <div class="row">
            <div class="col-md-12">
                    <div class="page-header">
                        <h2>Sửa người đăng ký</h2>
                    </div>
                    <p>Thêm gì đó vào</p>
                   <form method="POST" class="form">
                        <div>
                            <label class="form-group">name: <input type="text" value="<?php echo $row['name']; ?>" name="username" class="form-control"></label><br/>
                        </div>
                        <div>
                            <label class="form-group">SĐt <input type="text" value="<?php echo $row['sdt']; ?>" name="email" class="form-control"></label><br/>
                        </div>
                        <div>
                            <label class="form-group">Email <input type="text" value="<?php echo $row['email']; ?>" name="phone" class="form-control"></label><br/>
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
$name=$_POST['username'];
$sdt=$_POST['email'];
$email=$_POST['phone'];

 
// Create connection
$connn = new mysqli("localhost", "root", "", "btl2");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $connn->connect_error);
}
 
$sql = "UPDATE `signup` SET name='$username', sdt='$email', email='$phone' WHERE idup='$id'";
 
if ($connn->query($sql) === TRUE) {
  // echo "Record updated successfully";
  header("location: displaydangky.php");
  exit();
} else {
echo "Error updating record: " . $connn->error;
}
 
$connn->close();
}
?>


</body>
</html>