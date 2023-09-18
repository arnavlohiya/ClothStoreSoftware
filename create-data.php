<?php

session_start();

if (!isset($_SESSION['id']))
{
	header("Location: login.php");

}

include "con.php";



if(isset($_POST) && !empty($_POST)){
	$title = $_POST['title'];

	$buy = $_POST['buy'];

	$sell = $_POST['sell'];

	$role = $_SESSION['name'];
	
	

	if($title !="" && ($buy > 0  && is_numeric($buy)) && ( $sell > 0  && is_numeric($sell)) && $sell>$buy){
		
		if (isset($_POST['id'])){
			$id=$_POST['id'];
			$sql= "update products set title='$title', buy='$buy', sell='$sell', updated=NOW() where id='$id'";
			if (mysqli_query($conn,$sql)){echo "1";}else{ echo "0";}
			}else{
				
				$sql="insert into products(title,buy,sell,role,status,updated) values ('".$title."',".$buy.",".$sell.",'".$role."','0',NOW())";
				
			
		$query_result=mysqli_query($conn,$sql);
		
		$lastId =  mysqli_insert_id($conn);

		$Data = getProducts($conn);
		echo json_encode(array('id'=>$lastId,'table'=>$Data));
		}	

	}else{

		echo '';
	}



}



function getProducts($conn){

$sql = " select * from products where 1 order by id desc, status asc";

$query_result=mysqli_query($conn,$sql);
  
$numRows=$query_result->num_rows;

$table = '<table class="table table-bordered border-primary">';

$table .=' <thead>';

if($_SESSION['role']=="root" || $_SESSION['role']=="manager"){

	$table .='<tr><th scope="col">ID</th><th scope="col">Detail</th><th scope="col">HSN</th><th scope="col">MRP</th><th scope="col">Status</th><th scope="col">Created</th></tr>';

}else{

	$table .='<tr><th scope="col">ID</th><th scope="col">Detail</th><th scope="col">HSN</th><th scope="col">MRP</th><th scope="col">Status</th><th scope="col">Created</th></tr>';

}

$table .='</thead>';

$table .='<tbody>';

if($numRows>0){

	while($row = mysqli_fetch_assoc($query_result)){

		$status = "";

		if($row['status']=="0"){
			$status = '<td title="click to active" onclick="ChangeStatus(1,'.$row['id'].',this)"><i class="fa fa-times" aria-hidden="true" style="color:red;"></i></td>';
		}else{
			$status = '<td title="click to inactive" onclick="ChangeStatus(0,'.$row['id'].',this)"> <i class="fa fa-check" aria-hidden="true" style="color: blue;"></i></td>';
		}

		if($_SESSION['role']=="root" || $_SESSION['role']=="manager"){


		$table .='<tr><th scope="row">'.$row['id'].'</th><td>'.$row['title'].'</td><td>'.$row['buy'].'</td><td id="'.$row['id'].'">'.$row['sell'].'</td>'.$status.'><td>'.date('d-M h:i').'</td></tr>';
		}else{
		$table .='<tr><th scope="row">'.$row['id'].'</th><td>'.$row['title'].'</td><td>'.$row['buy'].'</td><td>'.$row['sell'].'</td>'.$status.'</td><td>'.date('d-M h:i').'</td></tr>';
		}
	}
}
$table .= '</tbody></table>';
return $table;

}

?>
