<?php
include "header.php";
include "admin/connection.php";
$con=new Connection('ecom');
$rows=$con->getAllProducts();
if(isset($_GET['added'])){ 
?>
	<div class="alert">Product added sucessfully</div>
 <?php
}
?>
<table class="table table-striped">
	<?php
		if(empty($rows)){
			?>
			<tr>
				<td>No produts</td>
			</tr>
			<?php
		}else{
		?>
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
				<a class="btn btn-danger" href="add_cart.php?id=<?php echo $row['id'];?>"><i class="fa fa-plus"></i>Add to Cart</a>
				</td>
				<?php
			}
			?>
	</tr>
	<?php
	}
	?>
</table>