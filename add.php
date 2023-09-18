<?php  
session_start();

if (!isset($_SESSION['id']))
{
	header("Location: login.php");

}

include "header.php";

$bool=($_SESSION['role']=="root" or $_SESSION['role']=="manager");
$root=($_SESSION['role']=="root");
?>


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
  


<input type="hidden" value="" id="checkBoxValues">
<input type="hidden" value="" id="editId">
<div class="toadd">
	<div class="row mt-4 alertMsg"></div>
<div class="row mt-4 msg"></div>

<div class="row mt-2">
<div class="col-sm-12">

				<div class="mb-3">
					<!-- <label for="exampleFormControlInput1" class="form-label">Name</label> -->
					<input type="text" name="title" class="form-control" id="title" placeholder="Enter Product Description">
				  </div>
				  <div class="mb-3">
					<!-- <label for="exampleFormControlInput1" class="form-label">Email address</label> -->
					<input name="buy" type="text" class="form-control"  onkeypress="return /[0-9]/i.test(event.key)" id="buy" placeholder="Enter Product Actual Amount">
				  </div>
				  <div class="mb-3">
					<!-- <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label> -->
          <input name="sell" type="text" class="form-control" onkeypress="return /[0-9]/i.test(event.key)" id="sell" placeholder="Enter Product Selling Amount">
				  </div>

				  <div class="mb-3">
					<button type="button" class="btn btn-primary btn-sm" onclick="Create(this);">Submit</button>
				  </div>

</div>


</div>			


</div>



<div class="recent_added">
	<div class="RecentlyAddedRow">
    <select name="action" class="form-control actionSelect" style="border:0px; width: 43%;display:inline; font-size:88%; margin-right:10%;">
      <option id="numRecords" value="-1"></option>
      <option value="active">Active</option>
      <option value="inactive">Inactive</option>
      <option value="update">Update</option>
      <?php
      if ($root){
      ?>
      <option value="delete">Delete</option>
      <option value="edit">Edit</option>
      <?php } ?>
      
    </select>
	<label class="inactiveStock" style="width: 55%; display:inline; text-align:center;  font-size:88%;"></label>
	</div>

<div class="col-sm-12 mt-1" id="List" style="max-height:310px;overflow:scroll;">



</div>




</div>

<script>
$(document).ready(function(){

  showProducts();

});

$('#click').click(function(){
	$('#title').attr(value,"hello");
	console.log($("#title").html());
	});


$(".actionSelect").change(function(){
	var action=$(this).val();
	var stat="";
	if (action!="-10"){
	if (action=="active"){
		 stat="1"
		}
	else if (action=="inactive"){
		 stat="0"
		}
	else if (action=="delete"){
		 stat="5"
		}
	else if (action=="edit"){
		 stat="edit"
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



function Create(obj){

var Title = $("input[name='title']").val();
var Buy = $("input[name='buy']").val();
var Sell = $("input[name='sell']").val();
if ($('#editId').val()!=""){
	console.log("in edit if stmn");
		$.post("create-data.php",{
			id: $('#editId').val(),
			title: Title,
			buy: Buy,
			sell: Sell
			},function(flag){
				if (flag=="1"){
					$('.msg').html('<div class="alert alert-primary alert-dismissible fade show" role="alert">Record Updated suceessfully !<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>')
					showProducts();
					$('#editId').val("")
					$("#checkBoxValues").val("");
					$("input[name='sell']").val("");
					$("input[name='buy']").val("");
					$("input[name='title']").val("");
					}else{
						$('.msg').html('<div class="alert alert-primary alert-dismissible fade show" role="alert">Invalid Input<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>')
					
						}
				
				} )
			//showProducts();
		
	}
	else if(Title !=""  &&  Buy !="" && Sell !="" ){

   if(parseInt(Sell)< parseInt(Buy)){
    $('.msg').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">sell amount should be greater than buy<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
    return;
  } 

  $.post("create-data.php",
  {
    title: Title,
    buy: Buy,
    sell:Sell
  },
  function(Response){

    var jsondata = JSON.parse(Response);

    //console.log(jsondata.id);return;
    
      if(jsondata.id < 1){
        $('.msg').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">invalid response<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>')
      }else{
        $('#create-List').html(jsondata.table);
        $('.msg').html('<div class="alert alert-primary alert-dismissible fade show" role="alert">Record added suceessfully !<strong style="margin-left: 20%;">ID : '+jsondata.id+'</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>')
		showProducts();
      }

  });


}else{
$('.msg').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">invalid input<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>')
}

}


function changeProductStatus(stat){
	
	if (stat=="edit"){
		var values= $("#checkBoxValues").val();
		var listToChange= values.split(",");
		if (listToChange.length > 1 || listToChange.length == 0 ){
			$(".alertMsg").html('<div class="alert alert-primary alert-dismissible fade show" role="alert"> <strong> One row must be edited at a time.</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>')
					
			}else{
				
				$.post("sendDetails.php",{
					id: values
					},
					function (Response){
						var jsondata = JSON.parse(Response);
						console.log("helhlelhelhlooo  "+Response);
						$('#title').val(jsondata.title);
						$('#buy').val(jsondata.buy);
						$('#sell').val(jsondata.sell);
						$('#editId').val(values);
						});
					
				
				$(".actionSelect").val('-1');	
				}
			
		
			
		
		
		}else if (!(stat=="-1")){
		
		
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
					showProducts("");
					$("#checkBoxValues").val("");
					
					}else if(flag=='0'){
						$(".alertMsg").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"> <strong> An error has occured.</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>')
					
						}
					else if(flag=='-1'){
						$(".alertMsg").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"> <strong> You are not an authorized user to perform this task.</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>')
					
						}
					else if(flag=='-5'){
						$(".alertMsg").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"> <strong> Only Inactive Products can be Deleted.</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>')
					
						}
				}
			)
			$(".actionSelect").val('-1');	
			
	}
	
	
}




function updateIndividualProduct(id,stat){
	$("#checkBoxValues").val(id);
	changeProductStatus(stat);
	
	}






















function ChangeStatus(Status,ID,Obj){

  $.post("changeStatus.php",
  {
    status: Status,
    id: ID
  },
  function(FLag){

      if(FLag < 1){
        
        $('.msg').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Invalid Permission<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>')
      }else{
          if(Status == 1){
            $('#'+ID).after('<td title="click to inactive" onclick="ChangeStatus(0,123,this)"><i class="fa fa-check" aria-hidden="true" style="color:blue;"></i></td>');
          }else{
            $('#'+ID).after('<td title="click to active" onclick="ChangeStatus(1,123,this)"><i class="fa fa-times" aria-hidden="true" style="color:red;"></i></td>');
          }

       
        $('.msg').html('<div class="alert alert-primary alert-dismissible fade show" role="alert">Record approved suceessfully !<strong style="margin-left: 20%;">ID : '+ID+'</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>')
      }

  });

}


function showProducts(){
	
	$.get("products.php?type=add", function(Response){
    
    var jsondata = JSON.parse(Response);
    console.log(jsondata.table);
    $('#List').html(jsondata.table);
    $('.inactiveStock').html("Added Stock (buy): "+jsondata.totalInactive);
    $('#numRecords').html("Recently Added: "+jsondata.noOfRecords);
	});
	console.log("showing products");
	}

</script>





<?php  include "footer.php";?>
