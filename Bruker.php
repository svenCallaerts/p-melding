<?php
require_once("functions.php");
if(!CheckLogin())
{
    header('Location: Login.php');
    exit;
}
include('connect.php');
$sql=mysqli_query($con,"select * from Bruker");
while($row=mysqli_fetch_array($sql))
{
$id=$row['ID'];
$fornavn=$row['Fornavn'];
$etternavn=$row['Etternavn'];
$email=$row['Email'];
$mobil=$row['Mobil'];
?>
<tr id="<?php echo $ID; ?>" class="edit_tr">

<td class="edit_td">
<span id="fornavn_<?php echo $id; ?>" class="text"><?php echo $fornavn; ?></span>
</td>

<td class="edit_td">
<span id="etternavn_<?php echo $id; ?>" class="text"><?php echo $etternavn; ?></span>
</td>
<td class="edit_td">
<span id="email_<?php echo $id; ?>" class="text"><?php echo $email; ?></span>
</td>
<td class="edit_td">
<span id="mobil_<?php echo $id; ?>" class="text"><?php echo $mobil; ?></span>
</td>
</tr>
<?php
}
?>
</table>

<?php
mysqli_close($con);
?> 