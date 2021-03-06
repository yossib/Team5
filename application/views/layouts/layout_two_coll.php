<?php
/**
 * Created by PhpStorm.
 * User: yossi
 * Date: 6/3/15
 * Time: 6:56 PM
 */
?>

<!-- Latest compiled and minified CSS -->

<!-- Optional theme -->

<!-- Latest compiled and minified JavaScript -->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title><?php if(isset($title)) echo $title;?></title>

  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
<style type="text/css">
  body {
    padding-top: 100px;
  }
  .starter-template {
    padding: 40px 15px;
    text-align: center;
  }
  .panel-body{
    text-align: left
  }
  ul.nav li{
    font-weight: bold;
    margin-top: 20px;
  }
</style>
</head>
<body>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<nav class="navbar navbar-inverse navbar-fixed-top">
  <img src="https://lh3.googleusercontent.com/-m_0UufORqvs/VW9TtkK8SNI/AAAAAAAAAAY/vBM9GC0JCeQ/w727-h225-no/somoto.gif" style="float: left"/>
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    <div id="navbar" class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li><a href="/feed">News Feed</a></li>
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</nav>
<br/><br/>
<div class="container">
	<div class="row">
	  <div class="col-md-8">
	 	<?php
    if(empty($content_data)){
      $content_data = array();
    }
    if(!empty($content)) {
      $this->load->view($content,$content_data);
    }
    	?>
      </div>
	  <div class="col-md-4"></div>
	</div>
  <div class="starter-template">
   
  </div>
</div>



<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

</body>
</html>