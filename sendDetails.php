<?php
include "con.php";
$id= $_POST['id'];
$query="select * from products where id='$id'";
$qryObj=mysqli_query($conn,$query);
$data=mysqli_fetch_assoc($qryObj);
$title=$data['title'];
$buy=$data['buy'];
$sell=$data['sell'];

echo json_encode(array('title'=>$title,'buy'=> $buy,'sell'=>$sell));

?>
