<?php
/*
 * Created on 3 nov. 2013
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
  // Define $myusername and $mypassword
  include('connect.php');
$myusername=$_POST['myusername'];
$mypassword=$_POST['mypassword'];

// To protect MySQL injection (more detail about MySQL injection)
$mypassword = stripslashes($mypassword);
$mypassword = mysql_real_escape_string($mypassword);

$encrypt_password=md5($mypassword);

$query="SELECT * FROM Bruker WHERE Email='$myusername' and Passord='$encrypt_password'";
$result=mysqli_query($con,$query);

$count=mysqli_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){

// Register $myusername, $mypassword and redirect to file "login_success.php"
session_start();
$_SESSION["username"]=$myusername;
$_SESSION["password"]=$encrypt_password;
header('Location: Aktiviteter.php');
}
else {
echo "Wrong Username or Password";
}

ob_end_flush();
?>
