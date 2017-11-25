<?php
session_start();
try {
    $conn = new PDO('mysql:host=localhost;dbname=login', 'root', '');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if(isset($_POST['contact'])){
    	$name = $_POST['name'];
        $email = $_POST['email'];
        $msg = $_POST['msg'];

        $insert = $conn->prepare("INSERT INTO contact (name, email, msg) VALUES (:name, :email, :msg)");
        $insert->bindParam(':name',$name);
        $insert->bindParam(':email',$email);
        $insert->bindParam(':msg',$msg);
        $insert->execute();
        $_SESSION['message'] = "Thank you for your message";
    }
}
catch(PDOException $e)
    {
    echo "error". $e->getMessage();
    }
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <title>Contact</title>
    <script src="https://s.codepen.io/assets/libs/modernizr.js" type="text/javascript"></script>
    <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
    <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css'>
    <link rel='stylesheet prefetch' href='http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.0/css/bootstrapValidator.min.css'>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

    <h3><?php 
    if(isset($_SESSION['message'])){
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    } 
    ?></h3>

	<div id="content" class="container-fluid"><div class="form-w3-agile">

    <header>Contact Me</header>

    <form role="form" class="form-horizontal" action=" " method="post"  id="contact_form" data-toggle="validator" autocomplete="on">

      <!-- input name-->
      <div class="form-group">
        <label class="col-md-4 control-label">Name</label>
        <div class="col-md-4 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input  name="name" placeholder="Name" class="form-control"  type="text">
          </div>
        </div>
      </div>

      <!-- input email-->
      <div class="form-group">
        <label class="col-md-4 control-label">E-Mail</label>
        <div class="col-md-4 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
            <input name="email" placeholder="E-Mail Address" class="form-control"  type="email">
          </div>
        </div>
      </div>

      <!-- Text input message-->
      <div class="form-group">
        <label class="col-md-4 control-label">Message</label>
        <div class="col-md-4 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
            <textarea class="form-control" name="msg" placeholder="Write your message"></textarea>
          </div>
        </div>
      </div>

      <!-- Button -->
      <div class="form-group">
        <label class="col-md-4 control-label"></label>
        <div class="col-md-4">
          <button type="submit" name="contact" id="sb" class="btn btn-md btn-success">Send <span class="glyphicon glyphicon-send"></span></button>
        </div>
      </div>

    </form>

  </div></div>

<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js'></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/js/bootstrapvalidator.min.js'></script>
<script  src="index.js"></script>

</body>
</html>
