<?php
include "..\header.php";
include "connection.php";
$con=new Connection('ecom');
$rows=$con->getAllProducts();
?>
<div class="well">
<a class="btn btn-primary" href="add_product.php"><i class="fa fa-plus"></i>Add </a>
</div>
<table class="table table-striped">
	<tr>
		<th>Name</th>
		<th>Content</th>
		<th>Price</th>
		<th>Options</th>
	</tr>
	<?php
			foreach($rows as $row){
				?>
	<tr>
		
				<td><?php echo $row['name'];?></td>
				<td><?php echo substr(strip_tags($row['content']),0,20);?></td>
				<td><?php echo $row['price'];?></td>
				<td>
				<a class="btn btn-danger" href="edit.php?id=<?php echo $row['id'];?>"><i class="fa fa-pencil"></i>Edit</a>
				<a class="btn btn-danger" href="delete.php?id=<?php echo $row['id'];?>" onclick return('Are you sure want to delete <?php echo $row['name'];?>?')><i class="fa fa-trash"></i>Delete</a>
				</td>
				<?php
			}
			?>
	</tr>
</table>