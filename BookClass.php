<?php

require 'Includes/library.php';
session_start();

$errors = array(); //empty array declaration

$username =  $_SESSION['username'] ;
/*
//get values
$user = $_POST['user'] ?? null;
$login = $_POST['login'] ?? null;
$pass = $_POST['pass'] ?? null;
$email = $_POST['email'] ?? null;
$hashed_password = password_hash($pass, PASSWORD_DEFAULT);
*/
$pdo = connectDB();

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//if (isset($_POST['edit'])) { //if submiitted




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>My Account</title>
    <link rel="stylesheet" href="Styles/projectCSS.css" />
    <link rel="stylesheet" href="Styles/calender.css" />
    <script src="https://kit.fontawesome.com/4752b7af37.js" crossorigin="anonymous"></script>

  </head>
  <hr>
<body>



        <div class="container">
            <img src="Images/gymm.jpg" alt="bg pic" style="width:100%;">
            <div class="centered"> EDIT <?php echo $username; ?>'s Account </div>
          </div>
    
   <div class = "sidenav">
      <ul class= "sidenavigate">
        <li><a class="active" href="https://loki.trentu.ca/~yasmeensaeed/3420/project/personalPage/personal.php">Home</a></li>
        <li><a href="https://loki.trentu.ca/~yasmeensaeed/3420/project/createSignUp.php">Create Class</a></li>
        <li class="sn"><a href="">Book Class</a></li>
        <li><a href="https://loki.trentu.ca/~yasmeensaeed/3420/project/EditUser.php">Edit Account</a></li>
        <li><a href="https://loki.trentu.ca/~yasmeensaeed/3420/project/deleteAcc.php">Delete Account</a></li>
        <li class="sn"><a href="https://loki.trentu.ca/~yasmeensaeed/3420/project/index.php">Log Out</a></li>
      </ul>
</div>


<section class="ClassAvailable">
<table style="width:100%">

<?php  

$query = "SELECT Title FROM `GYMCLASS`";

    print " \n";
    $result = $pdo->query($query);
    //return only the first row (we only need field names)
    $row = $result->fetch(PDO::FETCH_ASSOC);
    print "  
    
    \n";
    ?>
    <table>
        <tr>
    <th>
    <?php
    foreach ($row as $field => $value){
     print " $field \n";
    } // end foreach
    ?>
  </th>
  </tr>
    <?php
    print "  \n";
    $data = $pdo->query($query);
    $data->setFetchMode(PDO::FETCH_ASSOC);
    ?>
       <tr>
<th>
    <?php
    foreach($data as $row){
        print "  \n";
        foreach ($row as $name=>$value){
        print " $value \n";
        } // end field loop
        print "  \n";
       } 
   ?>
   </th>
    </tr>
     
<?php
$query = "SELECT session_date FROM `GYMCLASS`";

    print " \n";
    $result = $pdo->query($query);
    //return only the first row (we only need field names)
    $row = $result->fetch(PDO::FETCH_ASSOC);
    print "  
    
    \n";?>
   
    <tr>
<th>
<?php
    foreach ($row as $field => $value){
     print " $field \n";
    } // end foreach
    ?>
    </th>
    </tr>
      <?php
    print "  \n";
    $data = $pdo->query($query);
    $data->setFetchMode(PDO::FETCH_ASSOC);
    ?>
    <tr>
   <th>
 <?php
    foreach($data as $row){
        print "  \n";
        foreach ($row as $name=>$value){
        print " $value \n";
        } // end field loop
        print "  \n";
       } ?>
          </th>
    </tr>
       </table>



</section>


<form action="<?=htmlentities($_SERVER['PHP_SELF'])?>" method="POST" autocomplete="off">

<!--<div id='calendar'></div>-->


</form>

</body>
</html>

<script src='Script/min.js'></script>
<script src='Script/min2.js'></script>
<script src='Script/min3.js'></script>


<script>
 
$(document).ready(function () {
    var calendar = $('#calendar').fullCalendar({
 header: {
 left: 'prev,next today',
 center: 'title',
 right: 'month,basicWeek,basicDay'
 },
 navLinks: true, 
 editable: true,
 eventLimit: true,
        events: "all_events.php",
        displayEventTime: false,
        eventRender: function (event, element, view) {
            if (event.allDay === 'true') {
                event.allDay = true;
            } else {
                event.allDay = false;
            }
        }
 
    });
});
 
 
</script>