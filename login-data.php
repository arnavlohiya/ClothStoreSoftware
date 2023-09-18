<?php

session_start();


include "con.php";



if(isset($_POST) && !empty($_POST)){

   $sql="select * from users where user_id= '".trim($_POST['id'])."' and password= '".trim(md5($_POST['pwd']))."'";

  $query_result=mysqli_query($conn,$sql);
  
  $numRows=$query_result->num_rows;



  if($numRows>0)
	{

	$row= mysqli_fetch_assoc($query_result);
	
	$_SESSION['id']=$row['id'];
	$_SESSION['name']=$row['name'];
	$_SESSION['role']=$row['role'];
	

	echo  $_SESSION['name'] ;

	
	}else
	
	{
    echo  '';
  }


}

?>