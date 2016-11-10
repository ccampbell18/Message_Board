<?php

$con = mysqli_connect("localhost", "ccampbell18", "password", "ccampbell18");

if (mysqli_connect_errno())

{

echo "MYSQL Connection not established: ". mysqli_connect_error();
}


$username = mysqli_real_escape_string($con,$_POST['username']);

$pass = mysqli_real_escape_string($con,$_POST['password']);

$sel_user = "select * from board_users where user_name= '$username' AND password = MD5('$password')";

$run_user = mysqli_query($con, $sel_user);

$check_user = mysqli_num_rows($run_user);

if($check_user>0){

$_SESSION['user_name']=$username;

//echo "<script>window.open(‘home.php’,’_self’)</script>";
echo "successful login";
}

else {

//echo "<script>alert(‘Email or password is not correct, try again!’)</script>";
echo "failed login";
}

?>