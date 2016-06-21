<?php include "inc/header.php";
include "config.php";
include "database.php";

 ?>
<?php 
$db=new Databse();
$id=$_GET['id'];
$query="SELECT * FROM tbl_user WHERE id=$id";
$getdata=$db->Select($query)->fetch_assoc();

if (isset($_POST['submit'])) {
	$name=mysqli_real_escape_string($db->link,$_POST['name']);
	$email=mysqli_real_escape_string($db->link,$_POST['email']);
	$address=mysqli_real_escape_string($db->link,$_POST['address']);
	if ($name=='' || $email=='' ||  $address=='') {
		$error="Filed must not be empty!";
	}
	else
	{
		$query="UPDATE tbl_user SET name='$name',email='$email',address='$address' WHERE id=$id";
		$update=$db->Update($query);
	}
}

 ?>

  <?php 

if (isset($error)) {
	echo "<span style='color:red'>".$error."</span>";
}

  ?>
<form action="update.php?id=<?php echo $id?>" method="post">
 <table >
<tr>	
	<td>Name</td>
	<td><input type="text" name="name" value="<?php echo $getdata['name'] ;?>"></td>
<tr>
<tr>	
	<td>Email</td>
	<td><input type="text" name="email" value="<?php echo $getdata['email'] ;?>"></td>
<tr>
<tr>	
	<td>Address</td>
	<td><input type="text" name="address" value="<?php echo $getdata['address'] ;?>"></td>
<tr>
<tr>
	
	<td>
		
		<input type="Submit" name="submit" value="Update">
		<input type="reset" value="Cancel">
	</td>
</tr>
</table>
</form>
	<a href="index.php">Go Back</a>	 



<?php include "inc/footer.php"; ?>