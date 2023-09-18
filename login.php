<?php include "header.php"; ?>
<div class="toadd">
<div class="row mt-4 msg">
<!-- <div class="alert alert-primary alert-dismissible fade show" role="alert">
   Welcome Shivam, Redirecting in 3 seconds.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div> -->
</div>

<div class="row mt-2">
<div class="col-sm-12">

				<div class="mb-3">
					<!-- <label for="exampleFormControlInput1" class="form-label">Name</label> -->
					
					<!-- DOUBT: what is the onkeypress thing here? -->
					<input type="name" id="userid" onkeypress="return /[0-9]/i.test(event.key)" class="form-control" id="exampleFormControlInput1" placeholder="Enter Mobile No">
				  </div>
				  <div class="mb-3">
					<!-- <label for="exampleFormControlInput1" class="form-label">Email address</label> -->
					<input type="password" id="pwd" class="form-control" id="exampleFormControlInput1" placeholder="Enter Password">
				  </div>
				  <div class="mb-3">
					<button type="button" class="btn btn-primary btn-sm" onclick="Login(this);">Login</button>
				  </div>

</div>


</div>			


</div>



<div class="recent_added">
<div class="row mt-2">
<div class="col-sm-12">Users :</div>
<div class="col-sm-12 mt-1" style="max-height:310px;overflow:scroll;">
<table class="table table-bordered border-primary">
      <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
	  <th scope="col">User ID</th>
    <th scope="col">Password</th>
    <th scope="col">Status</th>
	  <th scope="col">Created</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Divakar</td>
	  <td>9899784414</td>
      <td>**********</td>
      <td title="click to inactive"> <i class="fa fa-check" aria-hidden="true" style="color: blue;"></i></td>
      <td title="2022-10-23 10:10:10">21 Oct</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Shivam</td>
	  <td>9899784414</td>
      <td>**********</td>
      <td title="click to inactive"> <i class="fa fa-check" aria-hidden="true" style="color: blue;"></i></td>
      <td title="2022-10-23 10:10:10">21 Oct</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>David</td>
	  <td>9899784414</td>
      <td>**********</td>
      <td title="click to inactive"> <i class="fa fa-check" aria-hidden="true" style="color: blue;"></i></td>
      <td title="2022-10-23 10:10:10">21 Oct</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Nitin</td>
	  <td>9899784414</td>
      <td>**********</td>
      <td title="click to inactive"> <i class="fa fa-check" aria-hidden="true" style="color: blue;"></i></td>
      <td title="2022-10-23 10:10:10">21 Oct</td>
    </tr>
    
  </tbody>

  </table>


</div>


</div>

</div>



<script>
function Login(obj){
var ID = $('#userid').val();
var PWD = $('#pwd').val();
//console.log("hi"+ID)
if(ID.length > 0 &&  PWD.length > 0){

  $.post("login-data.php",
  {
    id: ID,
    pwd: PWD
  },
  function(name){
    
      if(name==''){
        $('.msg').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">invalid credential<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>')
      }else{
        $('.msg').html('<div class="alert alert-primary alert-dismissible fade show" role="alert">Welcome '+name+', Redirecting in 1 second.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>')
        //window.location.href="index.php"; 
        setTimeout(function(){
          window.location.replace("index.php");
      }, 1000) 
      }

  });


}else{
$('.msg').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">invalid input<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>')
}

}

</script>



<?php  include "footer.php";?>



