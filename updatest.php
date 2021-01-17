


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
$query=mysqli_query($conn,"select * from `st` where idst='$id'");
$row=mysqli_fetch_assoc($query);
?>

<div class="wrapper">
    <div class="container-fluid">
         <div class="row">
            <div class="col-md-12">
                    <div class="page-header">
                        <h2>Sửa sở thích</h2>
                    </div>
                    <p>Thêm gì đó vào</p>
                   <form method="POST" class="form">
                        <div>
                            <label class="form-group">Username: <input type="text" value="<?php echo $row['namest']; ?>" name="username" class="form-control"></label><br/>
                        </div>
                        <div>
                            <label class="form-group">Nội dung <input type="text" value="<?php echo $row['noidungst']; ?>" name="email" class="form-control"></label><br/>
                        </div>
                        




                        <input type="submit" value="Update" name="update_user">
                        
                        <a href="displayst.php" class="btn btn-default">Cancel</a>
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

 
// Create connection
$connn = new mysqli("localhost", "root", "", "btl2");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $connn->connect_error);
}
 
$sql = "UPDATE `st` SET namest='$username', noidungst='$email' WHERE idst='$id'";
 
if ($connn->query($sql) === TRUE) {
  // echo "Record updated successfully";
  header("location: displayst.php");
  exit();
} else {
echo "Error updating record: " . $connn->error;
}
 


$connn->close();
}
?>


</body>
</html>