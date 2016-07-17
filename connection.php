<?php
class Connection{

	public $db;

	public function __construct($database,$user="root",$pass="")
	{
		$this->db=new PDO('mysql:host=localhost;dbname='.$database,$user,$pass);
	}

	public function insertUser($insert){

		$sql="INSERT INTO user(name,password,email)
				VALUES(?,?,?);";
		$stmt=$this->db->prepare($sql);
		$stmt->execute($insert);
	}
	public function getQuantity($product_id,$user_id){

		$sql="select quantity from cart where product_id=? && user_id=?";
		$stmt=$this->db->prepare($sql);
		$stmt->execute([$product_id,$user_id]);
		return $stmt->fetchColumn();
	}

	public function insertCart($product_id,$user_id){

		$quantity=$this->getQuantity($product_id,$user_id);

		if($quantity==0){
			$sql="INSERT INTO cart(user_id,product_id,quantity)
			      VALUES(?,?,?);";
			$stmt=$this->db->prepare($sql);
			$stmt->execute([$user_id,$product_id,1]);
		}
		else{
			$quantity=1+$quantity;
			$sql="update cart set quantity=? where user_id=? && product_id=?;";
			$stmt=$this->db->prepare($sql);
			$stmt->execute([$quantity,$user_id,$product_id]);
		}
	}
	public function getCart($user_id){
		$sql="select cart.id,product.name,cart.quantity from cart Join product on cart.product_id=product.id where user_id=?";
		$stmt=$this->db->prepare($sql);
		$stmt->execute([
			$user_id,
			]);
		return $stmt->fetchAll();
	}

	public function removeCart($cart_id){
		$sql="delete from cart where cart.id=?";
		$stmt=$this->db->prepare($sql);
		$stmt->execute([
			$cart_id
			]);
	}
}