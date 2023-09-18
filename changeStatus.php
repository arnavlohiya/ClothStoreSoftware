<?php

session_start();

if (!isset($_SESSION['id']))
{
	header("Location: login.php");

}

include "con.php";


if($_SESSION['role']=="root" || $_SESSION['role']=="manager"){

echo 1;


}else{
	echo 0;
}


?>