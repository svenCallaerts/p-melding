<?php
include('connect.php');
$fornavn=$_POST['firstName'];
$etternavn=$_POST['lastName'];
$email=$_POST['email'];
$mobil=$_POST['mobile'];
$passord=$_POST['password'];
if ($fornavn <> null && $etternavn <> null && $email <> null && $passord <> null){

	// To protect MySQL injection (more detail about MySQL injection)
	$passord = stripslashes($passord);
	$passord = mysql_real_escape_string($passord);
	
	$encrypt_password=md5($passord);
	$query="INSERT INTO Bruker (Fornavn, Etternavn, Email, Mobil, Passord)
VALUES ('$fornavn', '$etternavn','$email','$mobil','$encrypt_password')";
	mysqli_query($con,$query);
}
?>
<table width="300" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<form name="form1" method="post" action="check_login.php">
<td>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
<tr>
<td colspan="3"><strong>Login </strong></td>
</tr>
<tr>
<td width="78">Email adresse</td>
<td width="6">:</td>
<td width="294"><input name="myusername" type="text" id="myusername"></td>
</tr>
<tr>
<td>Passord</td>
<td>:</td>
<td><input name="mypassword" type="text" id="mypassword"></td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td><input type="submit" name="Submit" value="Login">
<a href="NyBruker.php">Ny bruker</a></td>
</tr>
</table>
</td>
</form>
</tr>
</table>

<?php
mysqli_close($con);
?> 