<?php
session_start();





?>
<!DOCTYPE html>
<html lang="en">

<head>
<link rel="stylesheet" href="../personalPage/personal.css" >

</head>
<center>
         
         <header>
             <img src="../personalPage/personaljp.jpg" alt="person" />
             <h1> <?php  echo $_SESSION['username']; ?>'s Personal Page</h1>
         </header>
</center>
         <hr>
         

<body>
    <div class = "sidenav">
      <ul class="sidenavigate">
        <li class="sn"><a class="active" href="https://loki.trentu.ca/~yasmeensaeed/3420/project/personalPage/personal.php">Home</a></li>
        <li class="sn"><a href="">Book Class</a></li>
        <li class="sn"><a href="https://loki.trentu.ca/~yasmeensaeed/3420/project/EditUser.php">Edit Account</a></li>
        <li><a href="https://loki.trentu.ca/~yasmeensaeed/3420/project/index.php">Calender</a></li>
        <li class="sn"><a href="https://loki.trentu.ca/~yasmeensaeed/3420/project/deleteAcc.php">Delete Account</a></li>
        <li class="sn"><a href="https://loki.trentu.ca/~yasmeensaeed/3420/project/index.php">Log Out</a></li>
      </ul>
      <div style="margin-left:25%;padding:1px 16px;height:1000px;">
 </div>

 <div class="Ptable">
            <table>
                <tr>
                  <th>ID</th>
                  <th>Title</th>
                  <th>Description</th>
                  <th>Date</th>
                  <th>Time</th>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                </tr>
              </table>







 </body>
</html>