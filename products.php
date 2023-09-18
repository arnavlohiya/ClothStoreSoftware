

<?php

session_start();

if (!isset($_SESSION['id']))
{
	header("Location: login.php");

}

include "con.php";

function toAlpha($HSN){
	
	$s=str_split($HSN);
	
	
	$alphaDict=['0'=>"z",'1'=>"a",'2'=>"b",'3'=>"c",'4'=>"d",'5'=>"e",'6'=>"f",'7'=>"g",'8'=>"h",'9'=>"i"];
	$alphaVal='';
	
	$static = "";
	foreach($s as $num){
		$alphaVal.=$alphaDict[$num];
		
		}
	$firstRandomLetter=["A","B","C","D","E","F","G","H","I","J","K","L","M"];
	$letter=$firstRandomLetter[array_rand($firstRandomLetter)];
	return $letter.$alphaVal;
	
	}





$clause =  "";
//add page only inactive products shouold be shown ...DONE
// add show stock inactive total...DONE
// list page filter, by default ntg.. only when click.
//list stock..DONE
//
/**
 * 
 * <button type="button" class="btn btn-outline-primary" style="text-decoration:none; "data-bs-toggle="modal" data-bs-target="#exampleModal'.$row['id'].$statusText.'">SELL</button>
			<!-- Modal -->
			<div class="modal fade" id="exampleModal'.$row['id'].$statusText.'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
			<div class="modal-content">
			<div class="modal-header">
			<h1 class="modal-title fs-5" id="exampleModalLabel">ID:'.$row['id'].'</h1>
			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<textarea class="form-control" id="saleRemarksTextArea" rows="3" placeholder="Please provide sale remarks (if any) "></textarea>
			</div>
			<div class="modal-footer">
			<button type="button" class="btn btn-primary" data-bs-dismiss="modal" >Close</button>
			<button type="button" class="btn btn-primary" value="hello working" data-bs-dismiss="modal" onclick="sell('.$row['id'].',$('.$textarea.').val())" >SELL</button>
			</div>
			</div>
			</div>
			</div>
 * **/
if(isset($_GET['type']) && $_GET['type'] =="list"){
	
	if (isset($_GET['status'])&& $_GET['status']==""){
	$clause .= " and status IN('1','3','4')";
	}else if(isset($_GET['status'])&& ($_GET['status']=="1" or $_GET['status']=="3" or $_GET['status']=="4")){
		$statusList=$_GET['status'];
		$clause .= " and status IN('$statusList')";
		}
	
}else if(isset($_GET['type']) && $_GET['type'] =="add"){
	$clause .= " and status IN('0')";
	}

if (isset($_GET['type']) && $_GET['type']=='sold'){
	$clause.=" and status in ('2','3','4')";
	
	if (isset($_GET['date'])){
		if($_GET['date']==""){
			$dateTemp=date('Y-m-d');
			}else{
		
		$dateTemp=$_GET['date'];
	}
		$clause.=" and updated like '%".$dateTemp."%'";
	}
	
	}

if(isset($_GET['id']) && $_GET['id'] !=""){

	$clause .= " and (id='".$_GET['id']."' or remarks like '%".$_GET['id']."%' or title like '%".$_GET['id']."%')";
	
}



$sql = " select * from products where 1 ".$clause." order by updated desc";

$query_result=mysqli_query($conn,$sql);
  
$numRows=$query_result->num_rows;

$table = '<table class="table table-bordered border-primary">';

$table .='<thead>';

if (isset($_GET['type']) && $_GET['type']=="sold"){
	
	
	$table .='<tr><th><input type="checkbox" name="selectAll"/></th><th scope="col">ID</th><th scope="col">Detail</th><th scope="col">MRP</th></tr>';

	}else if (isset($_GET['type']) && $_GET['type']=="search"){
		$table .='<tr><th><input type="checkbox" name="selectAll"/></th><th scope="col">ID</th><th scope="col">Detail</th><th scope="col">MRP</th><th>Action</th></tr>';

		}
	
	else if (isset($_GET['type']) && ($_GET['type']=="list" || $_GET['type']=="add")){
		$table .='<tr><th><input type="checkbox" name="selectAll"/></th><th scope="col">ID</th><th scope="col">Detail</th><th scope="col">HSN</th><th scope="col">MRP</th></tr>';
		}

$table .='</thead>';

$table .='<tbody>';

$textarea="'".'#saleRemarksTextArea'."'";

$totalSold=0;
$totalInactive=0;
$totalSellable=0;
$noOfRecords=0;
if($numRows>0){
	
	while($row = mysqli_fetch_assoc($query_result)){
		$noOfRecords=$noOfRecords+1;
		$status = "";
		$btnSold='';
		$remarks="'".$row['remarks']."'";
		$role="'".$row['role']."'";
		$HSN="'".toAlpha($row['buy'])."'";
		$created="'".date("Y-d-m H:i:s", strtotime($row['created']))."'";
		$updated="'".date("Y-d-m H:i:s", strtotime($row['updated']))."'";
		if($row['status']=="0"){
			$statusText="'Inactive'";
			$status = '<td><i class="fa fa-times" aria-hidden="true" style="color:red;"></i></td>';
			$btnSold='<button class="btn btn-outline-primary" onclick="" type="submit">Inactive</button>';
			$action='<i class="fa-solid fa-xmark icon-red" onclick="updateIndividualProduct('.$row['id'].',1)"></i></i>';
			$idColor="red";
			$totalInactive=$totalInactive+$row['buy'];
		}elseif($row['status']=="1"){
			$statusText="'Active'";
			$status = '<td><i class="fa fa-check" aria-hidden="true" style="color: blue;"></i></td>';
			$totalSellable=$totalSellable+$row['sell'];
			
			$action='<i class="fa-sharp fa-solid fa-circle-check icon-blue" onclick="updateIndividualProduct('.$row['id'].',0)"></i>';
			$idColor="blue";
		}elseif($row['status']=="2"){
			$totalSold= $totalSold+ $row['sell'];
			$statusText="'Sold'";
			$status = '<td><i class="fa fa-smile" aria-hidden="true" style="color:green;"></i></td>';
			$btnSold='<button class="btn btn-outline-primary" onclick="" type="submit">SOLD</button>';
			$action='hello';
			$idColor="green";
		}elseif($row['status']=="3"){
			$statusText="'Exchanged'";
			$status = '<td><i class="fas fa-exclamation-triangle" aria-hidden="true" style="color: #9d9d43;"></i></td>';
			//$btnSold='<button class="btn btn-outline-primary" onclick="sell('.$row['id'].')" type="submit">SELL</button>';
			//$action='<i class="bi bi-check-circle-fill"></i>';
			$idColor="#9d9d43";
			$totalSellable=$totalSellable+$row['sell'];
			
		}elseif($row['status']=="4"){
			$statusText="'Returned'";
			$status = '<td><i class="fas fa-exclamation-triangle" aria-hidden="true" style="color: red;"></i></td>';
			//$btnSold='<button class="btn btn-outline-primary" onclick="sell('.$row['id'].')" type="submit">SELL</button>';
			//$action='<i class="bi bi-check-circle-fill"></i>';
			$idColor="orange";
			$totalSellable=$totalSellable+$row['sell'];
		}
		
		if ($row['status']=="3" or $row['status']=="4" or $row['status']=="1"){
			$btnSold='<button type="button" class="btn btn-outline-primary"  onclick="sellmodal('.$row['id'].')">
			SELL
			</button>
			
			
			';
			
			}
		
		if (isset($_GET['type']) && $_GET['type'] =="sold"){
			//<button type="button" class="btn btn-lg " data-bs-toggle="popover" data-bs-title="ID: 45" data-bs-content="Status: Active  Time: 14 Nov 12:12:">45</button>
			$table .='<tr><td><input type="checkbox" name="checkbox"  onclick="checkMe(this,'.$row['id'].')"></td><td>
			
			<button type="button" id="modalBtn" class="btn btn-link" hsnVal="'.$row['buy'].'" style="text-decoration:none ;color:'.$idColor.'" onclick="idmodal('.$row['id'].','.$statusText.','.$HSN.','.$updated.','.$created.','.$remarks.','.$role.')">
			'.$row['id'].'
			</button>
			</td>
			<td>'.$row['title'].'</td><td id="'.$row['id'].'" >'.$row['sell'].'</td></tr>';
			
		}else if(isset($_GET['type']) && ($_GET['type']=="list" || $_GET['type']=='add')){
		
		$table .='<tr><td><input type="checkbox" name="checkbox"  onclick="checkMe(this,'.$row['id'].')"></td>
		<td>
		
		<button type="button" class="btn btn-link" style="text-decoration:none ;color:'.$idColor.'" onclick="idmodal('.$row['id'].','.$statusText.','.$HSN.','.$updated.','.$created.','.$remarks.','.$role.')">
			'.$row['id'].'
			</button>

		
		<td>'.$row['title'].'</td><td>'.toAlpha($row['buy']).'</td><td id="'.$row['id'].'" >'.$row['sell'].'</td></tr>';
		
		
		}else if(isset($_GET['type']) && $_GET['type']=="search"){
		
		$table .='<tr><td><input type="checkbox" name="checkbox"  onclick="checkMe(this,'.$row['id'].')"></td>
		<td>
		<button type="button" class="btn btn-link" style="text-decoration:none; color:'.$idColor.'"  onclick="idmodal('.$row['id'].','.$statusText.','.$HSN.','.$updated.','.$created.','.$remarks.','.$role.')">
			'.$row['id'].'
			</button>

			
			</td>
		<td>'.$row['title'].'</td><td id="'.$row['id'].'" >'.$row['sell'].'</td><td>'.$btnSold.'</td></tr>';
		
		
		}else{
		
		$table .='<tr><td><input type="checkbox" name="checkbox"  onclick="checkMe(this,'.$row['id'].')"/></td><td>'.$row['id'].'</td><td>'.$row['title'].'</td><td>'.$HSN.'</td><td id="'.$row['id'].'" >'.$row['sell'].'</td><td>'.$btnSold.'</td></tr>';
		
		
		}
	}
}
$table .= '</tbody></table>';

echo json_encode(array('table'=>$table, 'totalSold'=> $totalSold, 'totalInactive'=> $totalInactive, 'totalSellable'=> $totalSellable, 'noOfRecords'=>$noOfRecords));





?>


