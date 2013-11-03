<?php
require_once("functions.php");
if(!CheckLogin())
{
    header('Location: Login.php');
    exit;
}
include('connect.php');
$sql=mysqli_query($con,"select * from Aktivitet");
while($row=mysqli_fetch_array($sql))
{
$id=$row['ID'];
$navn=$row['Navn'];
$start=$row['Start'];
$slutt=$row['Slutt'];
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
</tr>
<?php
}
?>
</table>

<?php
mysqli_close($con);
?> 