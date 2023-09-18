<?php
include "con.php";



$list=$_POST['listOfItems'];
$CSList=explode(",",$list);
$status=$_POST['setStatus'];
if (isset($_POST['auth'])){
	$auth= $_POST['auth'];
	}


if($_POST['listOfItems'] !="" && $_POST['setStatus'] !=""){


$query="update products set status='$status', updated=NOW() where id in ($list) ";

if (isset($_POST['remark'])){
	$remarks=$_POST['remark'];
	$query="update products set status='$status', updated=NOW(), remarks='$remarks' where id in ($list) ";
	}

if ($status=="0" or $status=="1"){
	if ($auth){
		if (mysqli_query($conn,$query)){ echo "1";}else{ echo "0"; }
		
		}else{
			echo "-1";
			}
	
	}else if($status=="2"){
		if (mysqli_query($conn,$query)){ echo "1"; }else{ echo "0";}
		}else if($status=="3" or $status=="4"){
			
			$newQuery="update products set status='$status', updated=NOW() where id in ($list) and status='2'";
			if (mysqli_query($conn,$newQuery)){
				if (mysqli_affected_rows($conn) > count($CSList)-1){ echo "1"; }else{ echo "-2";}
				}else{
					echo "0";
					}
			}else if ($status=="5"){
				$query="delete from products where (id in ($list) and status='0')";
				if (mysqli_query($conn,$query) && (mysqli_affected_rows($conn) >0) ){ echo "1"; }else{ echo "-5";}
				}
			else{
				echo "0";
				}


	
}
else{
	echo "0";
	}
	



/**
 * 
 * if ($auth && ($status=="0" or $status=="1")){
	
	if (mysqli_query($conn,$query)){
	echo "1";
	}else{
		echo "0";
		}
	
	}
	else if ( $status=="3" or $status=="4"){
		$query="update products set status='$status', updated=NOW() where id in ($list) and status in (2)";
		
		if (mysqli_query($conn,$query)){
			echo "1";
		}else{
			echo "0";
		}
		
		}else if( $status=="2"){
			
			console.log("line 37 changeProductStatus");
			echo "1";
			}
		
		
		
		else{
			echo "-1";
			}
 * **/
?>
