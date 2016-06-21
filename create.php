<?php
 include "inc/header.php";
include "config.php";
include "database.php";

 ?>

<?php 
$db=new Databse();

if (isset($_POST['submit'])) {
	$name=mysqli_real_escape_string($db->link,$_POST['name']);
	$email=mysqli_real_escape_string($db->link,$_POST['email']);
	$address=mysqli_real_escape_string($db->link,$_POST['address']);
	if ($name=='' || $email=='' ||  $address=='') {
		$error="Filed must not be empty!";
	}
	else
	{
		$query="INSERT INTO tbl_user(name,email,address) values('$name','$email','$address')";
		$create=$db->Insert($query);
	}
}

 ?>

  <?php 

if (isset($error)) {
	echo "<span style='color:red'>".$error."</span>";
}

  ?>
<form action="create.php" method="post">
 <table >
<tr>	
	<td>Name</td>
	<td><input type="text" name="name" placeholder="plese type name"></td>
<tr>
<tr>	
	<td>Email</td>
	<td><input type="text" name="email" placeholder="plese type email"></td>
<tr>
<tr>	
	<td>Address</td>
	<td><input type="text" name="address" placeholder="plese type address"></td>
<tr>
<tr>
	
	<td>
		
		<input type="Submit" name="submit" value="submit">
		<input type="reset" value="Cancel">
	</td>
</tr>
</table>
</form>
	<a href="index.php">Go Back</a>	 



<?php include "inc/footer.php"; ?>