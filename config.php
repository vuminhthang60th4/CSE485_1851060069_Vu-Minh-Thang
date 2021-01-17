<?php
$conn=mysqli_connect('localhost', 'root', '', 'btl2');
if(!$conn){
    die("connect fail ".mysqli_connect_error());
}
?>