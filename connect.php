<?php
/*
 * Created on 3 nov. 2013
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 
 

define("HOST", "localhost"); // The host you want to connect to.
define("USER", "test"); // The database username.
define("PASSWORD", "test"); // The database password. 
define("DATABASE", "test"); // The database name.
 
$con = new mysqli(HOST, USER, PASSWORD, DATABASE);
// If you are connecting via TCP/IP rather than a UNIX socket remember to add the port number as a parameter.
// Check connection
if (mysqli_connect_errno($con))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
 
?>
