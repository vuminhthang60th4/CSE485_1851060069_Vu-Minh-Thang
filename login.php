




<?php
session_start();
include 'config.php';
if(isset($_POST['sign-in']) && $_POST['email'] != '' && $_POST['password'] != ''){
    $t1 = $_POST['email'];
    $t2 = $_POST['password'];
    $sql = "SELECT * FROM users WHERE email = '$t1' AND password = '$t2'";
    $duyet = mysqli_query($conn,$sql);
    if(mysqli_num_rows($duyet)>0){
        $_SESSION['email']= $t1;
        $o = mysqli_fetch_row($duyet);
        
        $_SESSION['thongbao']='dang nhap thanh cong';
        $sql = "UPDATE users set status = 1 WHERE email = '$t1' AND password = '$t2'";
        mysqli_query($conn,$sql);
        header('location:read.php');
    }
    else {
        $_SESSION['thongbao']='tai khoan va mat khau khong chinh xac';
        header('location:home.php');
    }
}
else {
    $_SESSION['thongbao']='vui long nhap day du thong tin dang nhap';
    header('location:home.php');
    phpAlert(   "Hello world!\\n\\nPHP has got an Alert Box"   );
}
?>
<?php
function phpAlert($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
}
?>