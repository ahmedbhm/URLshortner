<!doctype html>
<html lang="en">
  <head>
    <title>Shoetner</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <style>body{padding:220px; background:#2ABB9B} .btn,.form-control,.alert{border-radius:0px}</style>
   </head>
<body>
    <div class="container col-lg-7">
	  <form class="input-group mb-3" method="POST" action="">
        <input type="url" class="form-control" placeholder="url" name="link">
        <div class="input-group-append">
          <button class="btn btn-primary" type="submit">CUT URL</button>
        </div>
      </form> 
	  <?php
        if(isset($_POST['link'])){
	       include_once('functions.php'); 
	       $url=$_POST['link'];
	       functions::insert_url_in_DB($url);
	        echo '<div class="alert alert-info"><strong><a target="blanc" href="'.functions::get_code_by_url($url).'">
			'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'].functions::get_code_by_url($url).'</a></strong></div>';
	     }
       ?>
	</div>
</body>
</html>