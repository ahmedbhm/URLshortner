<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  	<style>
	body{
		background:#2C3E50;
		padding:200px;
	}
	.frame{
		background:#fff;
		padding:50px;
		border-radius:7px;
	    border-top: 5px solid #007bff;
		text-align:center;
	}
	.skip{
		min-width:200px;
	}
	</style>
  </head>
  <body>
  <div class="container col-lg-7 frame">
	 	<?php
	    if(isset($_GET['code'])){
	     include_once('functions.php');
		 $code=$_GET['code'];
		 if(functions::get_url_by_code($code)){
		  echo '<a href="'.functions::get_url_by_code($code).'" class="btn btn-primary btn-sm skip" >skip</a><br/>';
		 }else{
			header("location: index.php");
			die();	
		 }
	   }
	   ?>
   </div>
  </body>
</html>