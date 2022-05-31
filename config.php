<?php 
$localhost='localhost';
$DB_username='root';
$password='';
$DB_name='transactions';
$conn=mysqli_connect($localhost,$DB_username,$password) or die(mysqli_error());
$DB_select=mysqli_select_db($conn,$DB_name) or die(mysqli_error());
?>