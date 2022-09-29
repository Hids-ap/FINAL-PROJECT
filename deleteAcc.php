<?php

require 'Includes/library.php';
session_start();


$username =  $_SESSION['username'] ;


if(isset($_POST['delete']))
{
  $pdo = connectDB();

  $userid1 =  $_SESSION['userid'];


    $query = "DELETE FROM `yasmeensaeed`.`SignUsers_Project`  WHERE `SignUsers_Project`.`id`= :userid1";
    $stmt = $pdo->prepare($query);
 
    $idToDelete = $userid1 ;

    $stmt->bindValue(':userid1', $idToDelete);
    
    $delete = $stmt->execute();

    
    
    if(!$delete)
    {
 
      echo "Deletion Unsuccessful";
    }
    else
    {
   
      header("Location:login.php");
       exit();
    }
 
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>My Account</title>
    <link rel="stylesheet" href="Styles/projectCSS.css" />
    <script src="https://kit.fontawesome.com/4752b7af37.js" crossorigin="anonymous"></script>

  </head>

<body>


        <div class="container">
            <img src="Images/gymm.jpg" alt="bg pic" style="width:100%;">
            <div class="centered"> <?php echo $username; ?>'s Account </div>
          </div>
    
   <div class = "sidenav">
      <ul class= "sidenavigate">
        <li><a class="active" href="https://loki.trentu.ca/~yasmeensaeed/3420/project/personalPage/personal.php">Home</a></li>
        <li><a href="https://loki.trentu.ca/~yasmeensaeed/3420/project/createSignUp.php">Create Class</a></li>
        <li><a href="https://loki.trentu.ca/~yasmeensaeed/3420/project/EditUser.php">Edit Account</a></li>
        <li><a href="https://loki.trentu.ca/~yasmeensaeed/3420/project/deleteAcc.php">Delete Account</a></li>
        <li class="sn"><a href="https://loki.trentu.ca/~yasmeensaeed/3420/project/index.php">Log Out</a></li>
      </ul>
</div>
<form action="<?=htmlentities($_SERVER['PHP_SELF'])?>" method="POST" autocomplete="off">
<div>
<button id="delete" name="delete" onclick="return confirm('Are you sure you want to delete this account')"> Delete Account </button>
</div>
</form>

</body>
</html>