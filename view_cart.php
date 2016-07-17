<?php
session_start();
include "header.php";
include "connection.php";
$con=new Connection('ecom');
$user_id=$_SESSION['user_id'];
$rows=$con->getCart($user_id);
?>
<table class="table table-striped">
	<?php
		if(count($rows)==0){
		?>
		 <tr>
		 	<td>No products in the cart</td>
		 </tr>
		 <?php
		}else{
		?>
	<tr>
		<th>Id</th>
		<th>Product Name</th>
		<th>Quantity</th>
		<th>Options</th>
	</tr>
	<?php
			foreach($rows as $row){
				?>
	<tr>
		
				<td><?php echo $row['id'];?></td>
				<td><?php echo $row['name'];?></td>
				<td><?php echo $row['quantity'];?></td>
				
				<td>
				<a class="btn btn-danger" href="remove_cart.php?id=<?php echo $row['id'];?>"><i class="fa fa-trash"></i>Remove</a>
				</td>
				<?php
			}
			?>
	</tr>
	<?php
	}?>
</table>