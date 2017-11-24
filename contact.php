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
        $_SESSION['message'] = "Successfully Sent";
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
	<title>Contact</title>
    <style type="text/css">
        div{
            margin: 20px;
            padding: 200px 0px 200px;
        }
    </style>
</head>
<body>

    <?php 
    if(isset($_SESSION['message'])){
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    } 
    ?>

	<div><h1>Contact Me</h1><form method="post">
		
		Name<input type="text" name="name" id="name"><br>
		E-mail<input type="email" name="email" id="email"><br>
		Message<textarea name="msg"></textarea><br>
		<input type="submit" name="contact" value="Send" id="contact">

	</form></div>

</body>
</html>