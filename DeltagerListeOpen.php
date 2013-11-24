<?php
require_once("functions.php");
if(!CheckLogin())
{
    header('Location: Login.php');
    exit;
}
$id=$_GET['aktivitetId'];
$paamelding=$_GET['brukernavn']
?>
<?php
include('connect.php');

if ($paamelding){
	$sql=mysqli_query($con,"select ID from Bruker where Email='".$_SESSION["username"]."'");
	$brukerId=mysqli_fetch_object($sql)->ID;
	$sql=mysqli_query($con,"insert into Aktivitet_Bruker (Aktivitet_ID,BrukerID) values($id,$brukerId)");
	$erPaaMeldt=mysqli_commit($con);
}
if($erPaaMeldt){
	echo "Allerede påmeldt";
}

$sql=mysqli_query($con,"select * from Bruker b join Aktivitet_Bruker ab on b.ID=ab.BrukerID where ab.Aktivitet_ID=$id");
$paaMeldte=mysqli_num_rows($sql);
while($row=mysqli_fetch_array($sql))
{
$fornavn=$row['Fornavn'];
$etternavn=$row['Etternavn'];
echo $fornavn . " " . $etternavn ."</br>";
?>

<?php
}
$antallDeltagere=mysqli_query($con, "select AntallDeltagere from Aktivitet where ID=$id");
$ledig=mysqli_fetch_object($antallDeltagere)->AntallDeltagere-$paaMeldte;
?>
<a href="javascript:void(0)" onClick="javascript:lukkDeltagere(<?php echo $id; ?>)"><?php echo $ledig; ?></a>

<?php
mysqli_close($con);
?> 