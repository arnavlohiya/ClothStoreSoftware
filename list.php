<?php 
session_start();

if (!isset($_SESSION['id']))
{
	header("Location: login.php");

}

include "header.php";
//include "con.php";
 

$bool=($_SESSION['role']=="root" or $_SESSION['role']=="manager");


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




<div class="tolist">

<div class="row alertMsg">


<!--<div class="alert alert-primary alert-dismissible fade show" role="alert">
   
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  
</div>
-->
</div>

<div class="row mt-3">
<div class="col-sm-12">

<span class="d-flex" role="search">
<input class="form-control me-2" type="search" placeholder="Enter Product ID" id="products" aria-label="Search">
<button class="btn btn-outline-primary" type="submit" onclick="search()">GO</button>
</span>			

</div>


</div>			


<div class="totalItemsRow mt-3">
    <select name="action" class="form-control actionSelect" id="listProducts" style="border:0px; width:30%; display: inline; font-size:88%;" >
      <option value="-1" id="numItems">Total Items :</option>
      <option value="Active">Active</option>
      <option value="Inactive">Inactive</option>
      <!--<option value="3">Exchange</option>-->
      <!--<option value="4">Return</option>-->
    </select>
    
    <label id="totalSellableClass" style="width:40%;margin-left:5%; text-align:center; display: inline;font-size:88%;">Stock:  </label>
    
    <select name="filter" class="form-control" id="filter" style="border:0px; width:25%; display: inline; text-align:center; margin-left:5%;font-size:88%;" onchange="showProducts('',$(this).val())">
		<option value="">Filter</option>
		<option value="1">Active</option>
		<option value="3">Exchanged</option>
		<option value="4">Returned</option>
    </select>
</div>


<div class="col-sm-12" id="List" style="max-height:550px;overflow-y:scroll;">

</div>




<script>

$(document).ready(function(){
	showProducts("");
	})


$(".actionSelect").change(function(){
	var action=$(this).val();
	var stat="";
	if (action!="-10"){
	if (action=="Active"){
		 stat="1"
		}
	else if (action=="Inactive"){
		 stat="0"
		}
	else{
		stat=-1
		}
		
	$("#saveChangesModal").attr("onclick",'changeProductStatus("'+stat+'")')
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
	

	
function idmodal(id,stat, hsn, updated, created, remarks,role){
	$(".modal-body").html("");
	$(".modal-title").html("");
	$(".modal-title").html("id "+id);
	$(".modal-body").append("Status: "+stat+"<br><br>");
	$(".modal-body").append("HSN: "+hsn+"<br><br>");
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
		console.log("this is newValue: "+newValue.substr(0,1))
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
	
	
	
	
	//!(stat=="-1") && 
	
	if (!(stat=="-1")){
		
		
	console.log("checkBox has been clicked with this val: "+stat);
	var values= $("#checkBoxValues").val();
	//var listToChange= values.split(",");
	
	
	$.post("changeProductStatus.php",
		{	listOfItems: values,
			setStatus: stat,
			auth: '<?php echo $bool; ?>' 
			
			}, function(flag){
				if (flag=='1'){
					$(".alertMsg").html('<div class="alert alert-primary alert-dismissible fade show" role="alert"> <strong> Successfully Updated Product(s)!</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>')
					showProducts("")
					
					}else if(flag=='0'){
						$(".alertMsg").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"> <strong> An error has occured.</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>')
					
						}
					else if(flag=='-1'){
						$(".alertMsg").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"> <strong> You are not an authorized user to perform this task.</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>')
					
						}
				}
			)
			
			$("#checkBoxValues").val("");
	}	
}


function updateIndividualProduct(id,stat){
	$("#checkBoxValues").val(id);
	changeProductStatus(stat);
	
	}


function showProducts(id,status=""){
	if (id!=""){
		$.get("products.php?type=list&id="+id+"&status="+status, function(Response){
    
		var jsondata = JSON.parse(Response);
		console.log(jsondata.table);
		$('#List').html(jsondata.table);
	    $('#totalSellableClass').html("Stock: "+jsondata.totalSellable);
	    $('#numItems').html("Total Items: "+jsondata.noOfRecords);
		});
		
		}else{
	
			$.get("products.php?type=list&status="+status, function(Response){
    
			var jsondata = JSON.parse(Response);
			console.log(jsondata.table);
			$('#List').html(jsondata.table);
			$('#totalSellableClass').html("Stock: "+jsondata.totalSellable);
		    $('#numItems').html("Total Items: "+jsondata.noOfRecords);
			});
			}
}

function search(){
	
	var id= $("#products").val()
	console.log(id);
	showProducts(id);
	}


</script>

<?php  include "footer.php";?>
