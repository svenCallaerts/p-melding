<?php
require_once("functions.php");
if(!CheckLogin())
{
    header('Location: Login.php');
    exit;
}
$id=$_POST['aktivitetId'];
?>
<?php
include('connect.php');

$sql=mysqli_query($con,"select * from Bruker b join Aktivitet_Bruker ab on b.ID=ab.BrukerID");
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
<a href="javascript:void(0)" onClick="lukkDeltagere($id)"><?php echo $ledig; ?></a>

<?php
mysqli_close($con);
?> 