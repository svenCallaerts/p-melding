<?php
require_once("functions.php");
if(!CheckLogin())
{
    header('Location: Login.php');
    exit;
}
?>
<script type="text/JavaScript" src="js/jsFunctions.js"></script> 
<table border=1>
<tr>
<td>Aktivitet</td>
<td>Start</td>
<td>Slutt</td>
<td>Antall plasser</td>
<td>Ledig antall plasser</td>
</tr>
<?php
include('connect.php');
$sql=mysqli_query($con,"select * from Aktivitet");
while($row=mysqli_fetch_array($sql))
{
$id=$row['ID'];
$navn=$row['Navn'];
$start=$row['Start'];
$slutt=$row['Slutt'];
$antallDeltagere=$row['AntallDeltagere'];
$paaMeldte=mysqli_query($con, "select count(*) as antall from Aktivitet_Bruker where Aktivitet_ID=$id");
$ledig=$antallDeltagere-mysqli_fetch_object($paaMeldte)->antall;
?>
<tr id="<?php echo $ID; ?>" class="edit_tr">

<td class="edit_td">
<span id="first_<?php echo $id; ?>" class="text"><?php echo $navn; ?></span>
</td>

<td class="edit_td">
<span id="start_<?php echo $id; ?>" class="text"><?php echo $start; ?></span>
</td>

<td class="edit_td">
<span id="slutt_<?php echo $id; ?>" class="text"><?php echo $slutt; ?></span>
</td>
<td><span id="antall_<?php echo $id; ?>" class="text"><?php echo $antallDeltagere; ?></span></td>
<td><span id="deltagerListe_<?php echo $id; ?>" class="text"><a href="javascript:void(0)" onClick="javascript:visDeltagere(<?php echo $id ?>);"><?php echo $ledig; ?></a></span></td>
<td>
<?php
if ($ledig > 0){
	?>
	<input type="submit" value="meld på" onclick="javascript:meldPaa(<?php echo $id ?>)" />
	<?php
}else echo "Fult";
?>
</td>
</tr>
<?php
}
?>
</table>

<?php
mysqli_close($con);
?> 