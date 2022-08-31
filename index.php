<?php
include("connection.php");



if(isset($_GET['del_id']))
{
	$id=$_GET['del_id'];
	
	$sql="delete from posts where id='".$id."'";
	$result=mysqli_query($conn,$s);
	
	header('location:index.php');
	
}


?>

<style>
body {
  background-image: url("images/6.jpg");
}
</style>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Martian Data</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body">

<div align="center" class="container">
  <div class="row">
  	<div id="pics" align="center" class="col col-lg-4">
  		<p class="h6">Valles Marineris</p>
      <img src="images/1.png">
    </div>
    <div id="pics" align="center" class="col col-lg-4">
    	<p class="h6">Galle Cratertown</p>
      <img src="images/2.png">
    </div>
    <div id="pics" align="center" class="col col-lg-4">
    	<p class="h6">Thars Island</p>
      <img src="images/3.png">
    </div>
  </div>
  <br>
  <div class="row">
    <div id="pics" align="center" class="col col-lg-6">
    	<p class="h6">New New New York</p>
      <img src="images/4.png">
    </div>
    <div id="pics" align="center" class="col col-lg-6">
    	<p class="h6">Olympus Mons Spa & Casino</p>
      <img src="images/5.png">
    </div>
  </div>
</div>

<div class="container1">
<div class="row justify-content-md-center">
<div class="col-lg-8">
<h1 class="text-center">Martian Data</h1>
<p class="text-right"><a data-toggle="modal" data-target="#myModal" class="btn btn-primary">Add Martian</a></p>
<table class="table table-bordered table-striped" id="content">
</table>
</div>
</div>
</div>


<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="container py-5">
				  <h2>Add Book</h2>
				  <form>
				    <div class="form-group">
				      <label for="email">Title:</label>
				      <input type="text" class="form-control" id="title">
				    </div>
				    <div class="form-group">
				      <label for="pwd">Description:</label>
				      <textarea class="form-control" id="description"></textarea>
				    </div>
  
    <button type="button" id="save" class="btn btn-primary">Submit</button>
  </form>
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


<script>
$(document).ready(function(){
$.ajax({url:"select.php",
success:function(dataabc){
		//console.log(dataabc);
	$("#content").html(dataabc);		
}});


});
</script>

<script>
$('#save').click(function () {

$title = $('#title').val();
$desc = $("#description").val();



$.ajax({url:"insert.php",
method:"POST",
data:{titlecol:$title,desccol:$desc},
success:function(dataabc){
  window.location.href="index.php";
}});


});



</script>
</body>
</html>

