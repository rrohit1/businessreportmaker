<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login1.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login1.php");
  }
?>
<!DOCTYPE html>
<html>
 <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link
          rel="stylesheet"
          href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
          integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf"
          crossorigin="anonumous"
          />
        <link rel="stylesheet" href="sty.css" />
        <title>Torch @TheCoca-ColaCompany</title>
    </head>
<body  >
<div class="container">
<div class="header">
	<h2>TORCH!</h2>
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
    <p style="text-align:center; font-size:16px;">Welcome <strong style="color: red"><?php echo $_SESSION['username']; ?></strong></p><br /><br />
    
    <div style="text-align:center;">
    <p>
        Please click on <i>"DATA"</i> to see Media Data.<br /><br />
        
        <i>OR</i><br /><br />
        
        Click on <i>"ANALYZE"</i> to analyze your own data file.
        </p>
    </div>
    
    <div><br /><br /><br />
         <p style="text-align:center; font-size:16px;"> <a href="index1.php?logout='1'" class="button button1" style="color: red;">Logout</a> </p>
    </div>
    <div style="text-align:center;">
        <button class="btn" onclick="location.href = 'filter.php';" id="myButton" class="button button1">Data</button>
    
            <button onclick="location.href = 'examples/local.html';" id="myButton" class="button button1" >Analyze</button>
    </div>
    <?php endif ?>
</div>
    </div>		
</body>
</html>