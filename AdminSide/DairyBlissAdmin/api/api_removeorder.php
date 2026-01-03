<?php
	include 'connect.php';


		$id=$_POST['id'];
		$uid=$_POST['uid'];


		$q="DELETE from tbl_order WHERE id=$id";
		$res=mysqli_query($conn,$q);

		$order= array();
		$q="SELECT * FROM tbl_order where  uid='$uid' AND status=0";

		$result=mysqli_query($conn,$q);
		while($row=mysqli_fetch_assoc($result)){
			array_push($order,$row);
		}

		$response= array(
			"status"=>true,
			"message"=>"Updated to cart",
			"order"=>$order,
			
		);
		echo json_encode($response);
		$conn->close();


?>