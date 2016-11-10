<?php
include "connect.php";
echo "<link rel='stylesheet' type='text/css' href='stylesheet.css' />";

$fName = stripslashes($_POST['fName']);
$lName = stripslashes($_POST['lName']);
$uName = stripslashes($_POST['username']);
$email = stripslashes($_POST['email']);
$password = stripslashes($_POST['password']);
$verpass = stripslashes($_POST['verpass']);

$validation = FALSE;
$sesStart = FALSE;

if(empty($fName)) {
    echo "You must enter a first name.";
    echo "<a href = 'register.html'>Back to register</a>";
    $validation = FALSE;
}
else if(empty($lName)) {
    echo "You must enter a last name.";
    echo "<a href = 'register.html'>Back to register</a>";
    $validation = FALSE;
}
else if(empty($uName)) {
    echo "You must enter a username.";
    echo "<a href = 'register.html'>Back to register</a>";
    $validation = FALSE;
}
else if(empty($password)) {
    echo "You must enter a password.";
    echo "<a href = 'register.html'>Back to register</a>";
    $validation = FALSE;
}
else if(empty($verpass)) {
    echo "You must re-enter the password for verification.";
    echo "<a href = 'register.html'>Back to register</a>";
    $validation = FALSE;
}
else {
  $validation = TRUE;
}

if(!empty($password)) {
    if (strlen($password) < 6) {
        echo "The password is too short. Please enter a password that is at least 6 characters long.";
        echo "<a href = 'register.html'>Back to register</a>";
        $validation = FALSE;
      }
    else if($password != $verpass){
      echo "The passwords do not match! Please make sure the passwords match!";
      echo "<a href = 'register.html'>Back to register</a>";
    }
    else{
        $Password_md5 = md5($Password);
        $validation = TRUE;
    }
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
  $validation = TRUE;
}
else{
  echo "That is not a valid EMAIL address. Please go back and try again.";
  echo "<a href = 'register.html'>Back to register</a>";
  $validation = FALSE;
}

if($validation) {
    $query = "insert into board_users (user_name, first_name, last_name, email, password) VALUES('$uName', '$fName', '$lName', '$email', '$Password_md5')";
    $result = mysql_query($query, $connection);
    if (!$result) {
        echo "Sorry that name is taken.";
        echo "<a href = 'register.php'>Back to register.</a>";
    } else {
        echo "Thanks for registering.";
        //$sessStart = TRUE;
    }
}


?>
