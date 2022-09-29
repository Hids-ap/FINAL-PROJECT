<?php

require 'Includes/library.php';
session_start();

$errors = array(); //empty array declaration

$username =  $_SESSION['username'] ;
//get values
$user = $_POST['user'] ?? null;
$login = $_POST['login'] ?? null;
$pass = $_POST['pass'] ?? null;
$email = $_POST['email'] ?? null;
$hashed_password = password_hash($pass, PASSWORD_DEFAULT);

$pdo = connectDB();

if (isset($_POST['edit'])) { //if submiitted

    $query1 = "SELECT * FROM `SignUsers_Project` WHERE username=?";
    $stmt = $pdo->prepare($query1);
    $stmt->execute([$user]);
    $results = $stmt->fetch();

    
    if(!isset($user) || strlen($user) === 0)
    {
        $errors['user'] = true;
    }
    
    //check if username already exists
    if($results === false)
    {
   //     $errors['user'] = true;
    }
    else
    {
        if(password_verify($pass, $results['password']))
        {
            session_start();

            $_SESSION['userid'] = $userid;
            $_SESSION['username'] = $username;
           
        
            exit();
        }
        else
        {
            $errors['login'] = true;
        }
    }

   
    if (!isset($pass) || strlen($pass) === 0 ) {
        $errors['pass'] = true;
    }


    if (strpos($email, "@") === false) {
        $errors['email'] = true;
    }

  


    if (count($errors) === 0) {

        $userid1 =  $_SESSION['userid'];

        $query = "UPDATE `SignUsers_Project` SET username=?,password=?,email=?  WHERE id=$userid1";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$user, $hashed_password, $email]);
        

        $_SESSION['user'] = $_POST['user'];
        $_SESSION['pass'] = $_POST['pass'];
        $_SESSION['email'] = $_POST['email'];

        if(!$stmt)
        {
          echo "Update Unsuccessful";
        }
        else
        {
            header("Location:index.php");
            exit();
        }

    
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
<form action="<?=htmlentities($_SERVER['PHP_SELF'])?>" method="POST" autocomplete="off">


<div>
        <label for ="password">NEW Username : </label>
        </div>

    <div>
        <input class="username_input" type="text"  id="user" name="user"   value = "<?=$user?>" >
      <span class="<?=!isset($errors['user']) ? 'hidden' : "";?>">*Please enter a username</span>
    <span class="<?=!isset($errors['login']) ? 'hidden' : "";?>">*USERNAME IS TAKEN</span> 

</div>
<div>
    <label for ="password">New Password : </label><input class="password_input" type="text"  name="pass"  value="<?=$pass?>" placeholder="**********" ></div>
    </div>
    <div>
   <span class="<?=!isset($errors['pass']) ? 'hidden' : "";?>">*Please enter a password</span>

</div>

<div>
<label for ="email">NEW Email Address:</label>
</div>

<div>
<input class="email_input" type="text" placeholder="jamiesmith@gmail.com" id="email" name="email"  value="<?=$email?>" >
</div>
<span class="<?=!isset($errors['email']) ? 'hidden' : "";?>">*Please enter a valid email</span>
<div>
<button id="edit" class="edit" name="edit" onclick="return confirm('Are you sure you want to edit this account')"> Edit Account </button>
</div>
</form>

</body>
</html>