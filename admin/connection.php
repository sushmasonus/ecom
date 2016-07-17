<?php
class Connection{

	public $db;

	public function __construct($database,$user="root",$pass="")
	{
		$this->db=new PDO('mysql:host=localhost;dbname='.$database,$user,$pass);
	}

	public function insertProduct($insert){

		$sql="INSERT INTO product(name,content,price)
				VALUES(?,?,?);";
		$stmt=$this->db->prepare($sql);
		$stmt->execute($insert);
	}

	public function updateProduct($update){
		$sql="update product set
			  product.name=?,
			  product.content=?,
			  product.price=?
			  where product.id=?;";

		$stmt=$this->db->prepare($sql);
		$stmt->execute($update);
	}

	public function getAllProducts(){
		$sql="select * from product";
		$stmt=$this->db->query($sql);
		$stmt->execute();
		return $stmt->fetchAll();
	}

	public function getProduct($product_id){
		$sql="select * from product where product.id=?";
		$stmt=$this->db->prepare($sql);
		$stmt->execute([$product_id]);
		return $stmt->fetchColumn();
	}

	public function deleteProduct($product_id){
		$sql="delete from product where product.id=?";
		$stmt=$this->db->prepare($sql);
		$stmt->execute([$product_id]);
	}

	public function deleteAll(){
		$sql="delete from product ";
		$stmt=$this->db->query($sql);
		$stmt->execute();
	}

}