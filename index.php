<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="cssstyle.css">
    <style>
     .button {
            background-color: #fe001a;
            border: 2px solid #fe001a ;
            color: white;
            float: right;
            position:center ;
            padding: 16px 38px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 18px;
            margin: 4px 2px;
            -webkit-transition-duration: 0.4s;
            transition-duration: 0.4s;
            cursor: pointer;
            }

         .button1 {
        background-color: white; 
        color: black; 
        border-radius: 8px;
        border: 2px solid #black;
         }
         .button1:hover {
        background-color: #fe001a;
        color: white;
         }
    </style>
</head>
<body  >
<div class="bground">
<div class="header">
	<h2>Home Page</h2>
</div>
<div class="content">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['username'])) : ?>
    	<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
    
    <div>
        <br /><br /><br /><br /><br /><br />
         <p> <a href="index.php?logout='1'" class="button button1" style="color: red;">Logout</a> </p>
    </div>
        <button onclick="location.href = 'filter.php';" id="myButton" class="button button1">Data</button>
    <?php endif ?>
</div>
    </div>		
</body>
</html>