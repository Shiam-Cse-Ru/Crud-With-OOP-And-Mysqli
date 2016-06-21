<?php include "inc/header.php";
include "config.php";
include "database.php";

 ?>
<?php 
 $db=new Databse();
 $query="SELECT * FROM tbl_user";
 $read=$db->Select($query);
 ?>

 <?php 

if (isset($_GET['msg'])) {
	echo "<span style='color:green'>".$_GET['msg']."</span>";
}

  ?>

 <table class="tblone">
	<tr>
		
	
		<th width="25%">Name</th>
		<th width="25%">Email</th>
		<th width="25%">Address</th>
		<th width="25%">Action</th>
	</tr>
<?php 
if ($read) {?>
	<?php while ($row=$read->fetch_assoc()) {?>
<tr>
	<td><?php  echo $row['name'];?></td>
	<td><?php  echo $row['email'];?></td>
	<td><?php  echo $row['address'];?></td>
	<td><a href="update.php?id=<?php echo urlencode($row['id']); ?>">Edit</a>&nbsp &nbsp<a href="delete.php?id=<?php echo urlencode($row['id']); ?>">Delete</a></td>


</tr>
<?php } ?>
<?php } 

else {?>
<p>Data is not available</p>
	<?php } ?>
</table>
	<a href="create.php">Create</a>	 



<?php include "inc/footer.php"; ?>