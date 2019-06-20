<?php
//index.php
require 'server.php';
?>
<?php
//Trademark fill_options
$query = "SELECT * FROM first_level_category ORDER BY Channel ASC";
$statement= mysqli_query($db, $query);
$result = mysqli_fetch_all($statement,MYSQLI_ASSOC);

$query_new = "SELECT * FROM first_level_category_1 ORDER BY Channel ASC";
$statement_new= mysqli_query($db, $query_new);
$result_new = mysqli_fetch_all($statement_new,MYSQLI_ASSOC);
?>
<html>
 <head>
<!--  <link rel="stylesheet" href="style.css" type="text/css" />-->
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Torch @TheCoca-ColaCompany </title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />
     <style>
         
         #customers {
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
         }

         #customers td, #customers th {
             border: 1px solid #ddd;
            padding: 8px;
            }

            #customers tr:nth-child(even){background-color: #f2f2f2;}

            #customers tr:hover {background-color: #FF4C4C;}

            #customers th {
            position: sticky;
            top: 0;
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #fe001a;
            color: white;
            }
            body {
                background: linear-gradient(132deg, #ec5218, #1665c1);
                background-size: 400% 400%;
                animation: BackgroundGradient 30s ease infinite;
                
         }
          @keyframes BackgroundGradient {
                0% {background-position: 0% 50%;}
                50% {background-position: 100% 50%;}
                100% {background-position: 0% 50%;}
            }
         .body {
             margin: 0 auto;
             width: 85%;
             clear: both;
             height: 200%;
         }
         .tabContainer {
             width: 100%;
             height: 300px;
         }
         .tabContainer .buttonContainer{
             height: 13%;
         }
         .tabContainer .buttonContainer button {
             width: 20%;
             height: 100%;
             float: left;
             border: none;
             outline: none;
             cursor: pointer;
             padding: 10px;
             font-family: sans-serif;
             font-size: 18px;
             color: aliceblue;
             background-color: dimgrey;
             border-radius: 7px;
         }
         .tabContainer .buttonContainer button:hover {
             background-color: crimson;
         }
         
         .tabContainer .tabPanel{
             height: 100%;
             background-color: gray;
             color: white;
             display: none;
         }
          
         a {
             text-decoration: none;
         }
         a:link, a:visited{
             
         }
         a:hover, a:active{
             
         }
         .mainheader img {
             width: 10%;
             height: auto;
             margin: 2%;
         }
         .mainheader nav {
             background-color: #666;
             height: 40px;
             border-radius: 5px;
             -moz-border-radius: 5px;
             -webkit-border-radius: 5px;
             
         }
         .mainheader nav ul {
             list-style: none;
             margin: 0 auto;
         }
         .mainheader nav ul li {
             float: left;
             display: inline;
         }
         .mainheader nav a:link, .mainheader nav a:visited {
             color: #FFF;
             display: inline-block;
             padding: 10px 25px;
             height: 40px;
         }
         .mainheader nav a:hover, .mainheader nav a:active, .mainheader nav .active a:link, .mainheader nav .active a:visited {
             background-color: #CF5C3F;
             text-shadow: none;
         }
         .mainheader nav ul li a {
             border-radius: 5px;
             -moz-border-radius: 5px;
             -webkit-border-radius: 5px;
             text-decoration: none;
         }
         .button {
            background-color: #fe001a; /* Green */
            border: 2px solid #fe001a ;
            color: white;
            padding: 16px 16px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 12px;
            margin: 4px 2px;
            -webkit-transition-duration: 0.4s; /* Safari */
            transition-duration: 0.4s;
            cursor: pointer;
            }

         .button1 {
        background-color: white; 
        color: black; 
        border-radius: 8px;
        border: 2px solid black;
         }
         .button1:hover {
        background-color: #fe001a;
        color: white;
         }
         .table-responsive thead th {
             position: sticky;
             top: 0;
         }
     </style>
 </head>
 <body class="body">
     <br />
     <header class="mainheader"><img src="logo.png">
     </header>
  <div class="tabContainer">
    <div class="buttonContainer">
        <button onclick="showPanel(0, '#9C8181')">TRP Standard</button>
        <button onclick="showPanel(1, '#9DB2EC')">Unequivalised TRP</button>
        <button onclick="showPanel(2, '#9DECA8')">Media Spend</button>
        <button onclick="showPanel(3, '#5e160e')">About Torch</button>
        <button onclick="showPanel(4, '#FFBA6B')">Help</button>
    </div>  
<!--      Tab 1-->

  <div class="tabPanel">
    <br /><br />
      
      <div style="width: 800px; margin:0 auto">
          <div class="form-group">
    <label>Channel &nbsp;&nbsp;&nbsp;</label>
<!--    Channelfilter Dropdown-->
   <select name="first_level[]" id="first_level" multiple class="form-control">
   
   <?php 
 foreach($result as $row)
   {
    echo '<option value="'.$row["Channel"].'">'.$row["Channel"].'</option>'; 
   }
   ?>
   </select>
          </div>
      
<!--    Market filter Dropdown-->
   <div class="form-group">
   <label>Market  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
   <select name="second_level[]" id="second_level" multiple class="form-control">
   </select>
          </div>
<!--    Trademark filter Dropdown-->
<div class="form-group">
<label>Trademark</label>
   <select name="third_level[]" id="third_level" multiple class="form-control">
   
   </select>
          </div>
<div class="form-group">
<label>Aggregate</label>
   <select name="forth_level" id="forth_level"  class="form-control">
   <option value="Week">Weekly</option>
   <option value="Annual">Annually</option>
   
   </select>
          </div>

   <form method="post" action="export.php">
      
      <input type="submit" name="export" value="CSV Export" class="button button1"/>
      
      </form>
          

<div style="height: 200%; width: %; background: rgba(100, 100, 50, 0.5); border: 2px solid #FF4C4C; padding: 25px; margin-top: 10px;" class="table-responsive">
<!--   <div style="clear:both"></div>-->
   <br />
    <table id= "customers" style="width: 100%" cellpadding="2" cellspacing="2" class="table table-striped table-bordered">
     <thead >
      <tr>
       <th class="filter">Channel</th>
       <th class="filter">Region</th>
       <th class="filter">Country</th>
       <th class="filter">Trademark</th>
       <th class="filter">Date</th>
       <th class="filter">TRP Standard</th>
      </tr>
     </thead>
     <tbody>
     </tbody>
    </table>
   <br />
   <br />
   <br />
  </div>
            <button onclick="location.href = 'examples/local.html';" id="myButton" class="button button1" >Analyze Data</button>

     </div>
     </div>
      
<!--TAB 2-->
        <div class="tabPanel">
            
    <br /><br />
      
      <div style="width: 800px; margin:0 auto">
          <div class="form-group">
    <label>Channel &nbsp;&nbsp;&nbsp;</label>
<!--    Country filter Dropdown-->
   <select name="fifth_level[]" id="fifth_level" multiple class="form-control">
   
   <?php 
 foreach($result as $row)
   {
    echo '<option value="'.$row["Channel"].'">'.$row["Channel"].'</option>'; 
   }
   ?>
   </select>
          </div>
      
<!--    Trademark filter Dropdown-->
   <div class="form-group">
   <label>Market  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
   <select name="sixth_level[]" id="sixth_level" multiple class="form-control">
   
  
   </select>
          </div>
<!--    Channel filter Dropdown-->
<div class="form-group">
<label>Trademark</label>
   <select name="seventh_level[]" id="seventh_level" multiple class="form-control">
   
   </select>
          </div>
<div class="form-group">
<label>Aggregate</label>
   <select name="eighth_level" id="eighth_level"  class="form-control">
   <option value="Week">Weekly</option>
   <option value="Annual">Annually</option>
   
   </select>
          </div>
   <form method="post" action="export1.php">
      
      <input type="submit" name="export" value="CSV Export" class="button button1"/>
      
      </form>
          

<div style="height: 200%; width: %; background: rgba(100, 100, 50, 0.5); border: 2px solid #FF4C4C; padding: 25px; " class="table-responsive">
<!--   <div style="clear:both"></div>-->
   <br />
    <table id= "customers" style="width: 100%" cellpadding="2" cellspacing="2" class="table table-striped table-bordered">
     <thead >
      <tr>
       <th class="filter">Channel</th>
       <th class="filter">Region</th>
       <th class="filter">Country</th>
       <th class="filter">Trademark</th>
       <th class="filter">Date</th>
       <th class="filter">TRP Unequivalised</th>
      </tr>
     </thead>
     <tbody>
     </tbody>
    </table>
   <br />
   <br />
   <br />
  </div>
            <button onclick="location.href = 'examples/local.html';" id="myButton" class="button button1" >Analyze Data</button>

     </div>
     </div>
<!--      Tab 3-->
              <div class="tabPanel">
            
    <br /><br />
      
      <div style="width: 800px; margin:0 auto">
          <div class="form-group">
    <label>Channel &nbsp;&nbsp;&nbsp;</label>
<!--    Country filter Dropdown-->
   <select name="ninth_level[]" id="ninth_level" multiple class="form-control">
   
   <?php 
 foreach($result_new as $row)
   {
    echo '<option value="'.$row["Channel"].'">'.$row["Channel"].'</option>'; 
   }
   ?>
   </select>
          </div>
      
<!--    Trademark filter Dropdown-->
   <div class="form-group">
   <label>Market  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
   <select name="tenth_level[]" id="tenth_level" multiple class="form-control">
   
  
   </select>
          </div>
<!--    Channel filter Dropdown-->
<div class="form-group">
<label>Trademark</label>
   <select name="eleventh_level[]" id="eleventh_level" multiple class="form-control">
   
   </select>
          </div>
<div class="form-group">
<label>Aggregate</label>
   <select name="twelth_level" id="twelth_level"  class="form-control">
   <option value="Week">Weekly</option>
   <option value="Annual">Annually</option>
   
   </select>
          </div>
   <form method="post" action="export2.php">
      
      <input type="submit" name="export" value="CSV Export" class="button button1"/>
      
      </form>
          
<div style="height: 200%; width: %; background: rgba(100, 100, 50, 0.5); border: 2px solid #FF4C4C; padding: 25px; " class="table-responsive">
<!--   <div style="clear:both"></div>-->
   <br />
    <table id= "customers" style="width: 100%" cellpadding="2" cellspacing="2" class="table table-striped table-bordered">
     <thead >
      <tr>
       <th class="filter">Channel</th>
       <th class="filter">Region</th>
       <th class="filter">Country</th>
       <th class="filter">Trademark</th>
       <th class="filter">Date</th>
       <th class="filter">Total Spend (000s, US$)</th>
      </tr>
     </thead>
     <tbody>
     </tbody>
    </table>
   <br />
   <br />
   <br />
  </div>
            <button onclick="location.href = 'examples/local.html';" id="myButton" class="button button1" >Analyze Data</button>

     </div>
     </div>
      
<!--      Tap 4-->
      <div class=tabPanel>
          <br />
          <p style="font-family:Courier,fantasy; font-size:20px; font-style: italic; font-weight:100; font-align:left; color:white; margin: 7px;
  border: 3px dotted crimson;"><b style="color:crimson">TORCH </b> provides Media data to users. You can get data for three major media metrics for now. These metrics include TRP Standard, Unequivalised TRP and Media Spend.<br/>
              You can click on help as to contact the TORCH holder for more information and data guidance.</p>
          <ul style="font-family:Arial; font-size:18px; font-style: italic; font-weight:100; font-align:left; color:crimson; ">
              <li>Filter data byChannel, byMarket, byTrademark.</li>
          <br/>
              <li>Option to view data Weekly or Annually.</li>
          <br />
              <li>Download CSV file for you own analysis and reports.</li>
          <br />
              <li>Analyze the data using pre-built analyze feature of TORCH!</li>
          
          </ul>
      
      
      
      </div>
<!--      Tap 4-->
      <div class=tabPanel>
          <br />
          <br />
          <p style="text-align:center; color:blue;line-height:2.6">Contact <b> Rohit Rohit </b> for more details</p>
          <br />
          <p style="text-align:center; text-color:black"><a href="mailto:rrohit@coca-cola.com">Email Me</a></p>
      </div>
     </div>
 </body>
</html>


<script src="new.js">


</script>
