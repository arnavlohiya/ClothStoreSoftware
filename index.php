<html>
<head>


</head>
<?php  


include "header.php";
include "con.php";


$bool=($_SESSION['role']=="root" or $_SESSION['role']=="manager");
if (!isset($_SESSION['id']))
{
	header("Location: login.php");

}

/**
$querySu="select sum(buy), count(id) from products where status in (1,3,4) and updated='$date'";
$sumObj=mysqli_query($conn,$querySu);
$sumData= mysqli_fetch_assoc($sumObj);
$sumValue=$sumData['sum(buy)'];
$noOfProducts= $sumData['count(id)'];  
**/
?>

<input type="hidden" value="" id="checkBoxValues"> 


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ---
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" id="saveChangesModal" onclick="">Save changes</button>
      </div>
    </div>
  </div>
</div>


<!-- start of search form-->
<div class="tosell">
	<div class="row mt-4 msg"></div>
<div class="row mt-4">
<div class="col-sm-12">

<span class="d-flex" role="search">
			  <input class="form-control me-2" id="productid" type="search" placeholder="Enter Product ID | Remarks" aria-label="Search">
			  <!--<input class="form-control me-2" id="searchRemarks" type="search" placeholder="Search with Remarks on sale" aria-label="Search">-->
			  <button class="btn btn-outline-primary" onclick="search()" type="submit">GO</button>
</span>

</div>
</div>
<!-- end of search form-->





<!-- start of searched items  onchange="changeProductStatus($(this).val())"  -->
<div class="row mt-4">
<div class="col-sm-3">
    <select name="action" class="form-control actionSelect" style="border:0px; font-size:88%;">
      <option value="-10">Searched Item :</option>
      <!-- <option value="2">SELL</option> -->
      <option value="Exchange">Exchange</option>
      <?php
      if ($bool){
      ?>
      <option value="Return">Return</option>
      <?php } ?>
    </select>
 
</div>

<div class="col-sm-12 mt-1" id="List2">
<table class="table table-bordered border-primary">
      <thead>
    <tr>
      <th scope="col"><input type="checkbox"></th>
      <th scope="col">ID</th>
      <th scope="col">Detail</th>
      
      <th scope="col">MRP</th>
	  <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
	  </div>
    <!-- <tr>
      <th scope="row">1</th>
      <td>SP Jeans SP Jeans SP Jeans</td>
      <td>74009</td>
      <td>1128</td>
   <td> <button class="btn btn-outline-primary" type="submit">SELL</button></td>
    </tr> -->
  </tbody>

  </table>


</div>


</div>

</div>
<!-- end of searched items-->
<div class="row mt-4"></div>
<select name="action" class="form-control actionSelect" style="border:0px; width:35%; display: inline; font-size: 88%">
      <option value="-1">Recent Sold:</option>
      <option value="Exchange">Exchange</option>
      
      <?php
      if ($bool){
      ?>
      <option value="Return">Return</option>
      <?php } ?>
      
    </select>
    <label id="soldTotal" style=" width:30%; display: inline; font-size: 88%">Sold:</label>
    <select name="action" class="form-control" style="border:0px; width:35%; text-align:right; display: inline; font-size: 88%" id="dateSelect" onchange="RecentSold($(this).val())">
     <!-- <option value="">Date</option>-->
      <?php
      //$today= date("d");
      for ($days = 0; $days <= 10; $days++){
		  ?>
		    <option value="<?=date('Y-m-d',strtotime(date('Y-m-d').' -'.$days.' days'))?>"><?=date('Y-m-d',strtotime(date('Y-m-d').' -'.$days.' days'))?></option>
			<?php } ?>
    </select>
    
<!-- start of recently sold items -->
<div class="col-sm-12 mt-1" id="List" style="max-height:450px;overflow-y:scroll;">

</div>

</div>
<!-- end of recently sold items-->





<!--<div class="data">

<h2><label>Total Value of Inventory: </label></h2>
<h2><label>Total number of products: </label></h2>
</div>-->


<script>
$(document).ready(function(){

	RecentSold();

});

$("#productid").keypress(function(e){
	if (e.which == 13) {
    search();
	
	}
	})

$(".actionSelect").change(function(){
	var action=$(this).val();
	var stat="";
	if (action!="-10"){
	if (action=="Return"){
		 stat="4"
		}
	else if (action=="Exchange"){
		 stat="3"
		}
	else{
		stat=-1
		}
		
	$("#saveChangesModal").attr("onclick",'changeProductStatus('+stat+')')
	$(".modal-title").html("");
	$(".modal-body").html("");
	$(".modal-title").html("Are you sure?");
	$("#saveChangesModal").html("Save Changes");
	$(".modal-body").html(action+" product(s) with ID: "+$('#checkBoxValues').val());
	if ($('#checkBoxValues').val()!=""){
	$(".modal").modal('show');
	}
	}
	})

function search(obj){

var ID = $('#productid').val();

if( ID !=""){

  $.get("products.php?type=search&id="+ID, function(Response){
    
   var jsondata = JSON.parse(Response);
   console.log(jsondata.table);
   $('#List2').html(jsondata.table);
  });

}else{

  console.log("err");

}

}
$(".clickMe").click(function(){
	idmodal(63 , 2 , 20 , 2022-11-21  , 2022-11-20  , 9899784414);
	})
	
	
function idmodal(id,stat, hsn, updated, created, remarks,role){
	$(".modal-body").html("");
	$(".modal-title").html("");
	$(".modal-title").html("id "+id);
	
	$(".modal-body").append("Status: "+stat+"<br><br>");
	$(".modal-body").append("HSN: <button style='border: 0px;  width: 25%; display: inline' class='form-control' id='HSNBtn'>"+hsn+"</button><br><br>");
	$(".modal-body").append("Role: "+role+"<br><br>");
	$(".modal-body").append("Updated: "+updated+"<br><br>");
	$(".modal-body").append("Created: "+created+"<br><br>");
	$("#saveChangesModal").html("OK");
	if (remarks!=undefined){
	$(".modal-body").append("Remarks: "+remarks);
	}else{
		$(".modal-body").append("Remarks:");
		}
	$(".modal").modal('show');
	
	}


$("#HSNBtn").click(function (){
	console.log("hei")
	var temp= $(this).val();
	var first= temp.slice(0);
	if(isAlpha(first)){
		var numer=$('modalBtn').attr("hsnVal");
		$("#HSNBtn").val()
		}else{
			$("HSNBtn").val("asd");
			
			}
	
	
	})
function isAlpha(){
	
    if (ch >= "A" && ch <= "z"){
        return true
    }

}
	




function sellmodal(id){
	var textarea="'"+'#saleRemarksTextArea'+"'";
	$(".modal-body").html("");
	$(".modal-title").html("");
	$(".modal-title").html(id);
	$(".modal-body").html('<textarea class="form-control" id="saleRemarksTextArea" rows="3" placeholder="Please provide sale remarks (if any) "></textarea>');
	var rem=$('#saleRemarksTextArea').val();
	$("#saveChangesModal").attr("onclick",'sell('+id+',$('+textarea+').val())')
	//onclick='"sell('.$row['id'].',$('.$textarea.').val())"
	
	//var rem= "'"+$('#saleRemarks').val()+"'";
	
	$(".modal").modal('show');
	}


function checkMe(obj,id){
	
	if ($("#checkBoxValues").val().includes(id)){
		var checkBoxValues= $("#checkBoxValues").val();
		var idLen=id.toString().length;
		console.log("this is idLen: "+idLen)
		var startIndex= checkBoxValues.indexOf(id)-1;
		console.log("this is startindex: "+startIndex)
		var endIndex=startIndex+idLen+1;
		console.log("this is endIndex: "+endIndex)
		var before= checkBoxValues.substr(0,startIndex)
		var after= checkBoxValues.substr(endIndex,)
		var newValue=before+after;
		console.log("this is newValue: "+newValue)
		if(newValue.substr(0,1)==","){
			console.log("im coming here lets go")
			checkBoxValues= $("#checkBoxValues").val(newValue.substr(1,));
			}else{
		checkBoxValues= $("#checkBoxValues").val(newValue);
		}
		console.log("this is checkBox NEW: "+$("#checkBoxValues").val());
		}
		else if($("#checkBoxValues").val()==""){
				$("#checkBoxValues").val(id)
				console.log("this is the checkBoxValues: "+$("#checkBoxValues").val());
			}else{
				var prevVal= $("#checkBoxValues").val();
				$("#checkBoxValues").val(prevVal+','+id)
				console.log("this is the checkBoxValues: "+$("#checkBoxValues").val());
				}
}
	
	
function changeProductStatus(stat){
	console.log("checkBox has been clicked with this val: "+stat);
	var values= $("#checkBoxValues").val();
	var listToChange= values.split(",");
	
	//listTochange.forEach(checkStatus());
	$.post("changeProductStatus.php",
		{	listOfItems: values,
			setStatus: stat,
			auth: '<?php echo $bool; ?>' 
			}, function(flag){
				if (flag=='1'){
					$(".msg").html('<div class="alert alert-primary alert-dismissible fade show" role="alert"> <strong> Successfully Updated Product(s)!</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>')
					search()
					RecentSold()
					$("#checkBoxValues").val("");
					}else if(flag=='0'){
						$(".msg").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"> <strong> There is an error with the database connection.</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>')
					
						}
					else if(flag=='-1'){
						$(".msg").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"> <strong> You are not authorized to perform this action.</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>')
					
						}
					else if(flag=='-2'){
						$(".msg").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"> <strong> Can only exchange or return sold Products.</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>')
					
						}
				}
			)
			
			
	}	
	
	
function sell(PID,remark1){
	//console.log("selling item" );
	//alert(remark1);
	
		$.post("changeProductStatus.php",
		{	listOfItems: PID,
			setStatus: 2,
			auth: false,
			remark: remark1 
			}, function(flag){
				if (flag ==1){
							 $('.msg').html('<div class="alert alert-primary alert-dismissible fade show" role="alert">Record sold suceessfully !<strong style="margin-left: 20%;"></strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>')
					
						search(this);
						RecentSold();
					}else if(flag=="-3"){
					$('.msg').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Unsold items can not be exchanged or returned<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>')
							
					}
					
					else{
						
						$('.msg').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">invalid response<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>')
						
						}
				}
			)
			
	
}


function RecentSold(date=""){
	var dateToSearch=date;
	
  $.get("products.php?type=sold&date="+date, function(Response){
    
    var jsondata = JSON.parse(Response);
    console.log(jsondata.table);
    $('#List').html(jsondata.table);
    $('#soldTotal').html("Sold: "+jsondata.totalSold);
	//console.log(Response);
  });	
	
}
function abcd(){
	alert("fadasd");
	}
	
	
const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl))

</script>


<?php  include "footer.php";?>

</html>
