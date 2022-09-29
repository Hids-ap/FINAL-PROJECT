<?php


require 'Includes/library.php';

$username = $_POST['username'] ?? "";
$password = $_POST['password'] ?? "";


$error = [];

$pdo = connectDB();

if(isset($_POST['submit']))
{
 

    $query = "SELECT `id`,`username`,`password` FROM `SignUsers_Project` WHERE username= ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$username]);
    $results = $stmt->fetch();

    if(!empty($_POST["RM"])) {
      setcookie ("username",$_POST["username"],time()+ 3600);
      setcookie ("password",$_POST["password"],time()+ 3600);
      echo "Cookies Set Successfuly";
    } else {
      setcookie("username","");
      setcookie("password","");
    }

    if($results === false)
    {
        $errors['user'] = true;
    }
    else if(password_verify($password, $results['password']))
        {
            session_start();

            $_SESSION['username'] = $username;
            $_SESSION['userid'] = $results['id'];
            $_SESSION['username'] = $_POST['username'];

       

            header("Location:personalPage/personal.php");
            //header("Location:personal.php");
            exit();
        }
  else 
        {
            $errors['login'] = true;
        }

       
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>LOGIN</title>
    <link rel="stylesheet" href="Styles/projectCSS.css" />
    <script src="https://kit.fontawesome.com/4752b7af37.js" crossorigin="anonymous"></script>

  </head>

<body>

   

         
 

        <div class="container">
            <img src="Images/gymm.jpg" alt="bg pic" style="width:100%;">
            <div class="centered"> LOGIN PAGE </div>
          </div>
    

          <div class = "sidenav">
      <ul class= "sidenavigate">
        <li><a class="active" href="https://loki.trentu.ca/~yasmeensaeed/3420/project/personalPage/Mainpage.php">Home</a></li>
      </ul>
</div>  

<section class="UP">
<form action="<?=htmlentities($_SERVER['PHP_SELF'])?>" method="POST" autocomplete="off">

  <div>
    <label for="username"> Username:</label>
    <input id="username" name="username" type="text" placeholder="John Smith" value="<?php if(isset($_COOKIE["username"])) { echo $_COOKIE["username"]; } ?>">
  </div>

  <div>
    <label for="password"> Password:</label>
    <input id="password" name="password" type="text" placeholder="**********" value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>"/>
  </div>

  <div>
    <span class="<?=!isset($errors['user']) ? 'hidden' : "";?>">*That user doesn't exist</span>
    </div>

    <div>
    <span class="<?=!isset($errors['login']) ? 'hidden' : "";?>">*Incorrect login info</span>
 </div>

  <div>
    <input class="RM" id="RM" name="status" type="radio" value="R" />
    <label for="RM">Remember Me</label>
  </div>

  <div>
  <button id="submit" name="submit" class="jj"> LOGIN </button>
  </div>

  <div class="jj">
  <a class="btn btn-block btn-social btn-google-plus" href="login.php" >
   <i class="fa fa-google-plus"></i> Login with Google
 </a>
 </div>

  <div>
  <button id="submit1" class="jj"><a href="https://loki.trentu.ca/~yasmeensaeed/3420/project/signup.php"> SIGN UP </a></button>
  </div>

  </form>
</section>
</body>
</html>

