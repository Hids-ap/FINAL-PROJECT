<?php

include 'Includes/library.php';

$pdo = connectDB();


$errors = array(); //empty array declaration

//get values
$user = $_POST['user'] ?? null;
$login = $_POST['login'] ?? null;
$pass = $_POST['pass'] ?? null;
$email = $_POST['email'] ?? null;
$hashed_password = password_hash($pass, PASSWORD_DEFAULT);

if (isset($_POST['submit'])) { //if submiitted

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


        $query = "INSERT INTO `SignUsers_Project` values (NULL, ?,?,?, NOW())";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$user, $hashed_password, $email]);
        
        $_SESSION['user'] = $_POST['user'];
        $_SESSION['pass'] = $_POST['pass'];
        $_SESSION['email'] = $_POST['email'];


   //  $query = "UPDATE `cois3420_naughtynice_options` SET request_count = request_count + 1 WHERE ID = ?";
     //   $stmt = $pdo->prepare($query);
       // $stmt->execute([$primary]);

        //send the user to the thankyou page.
        header("Location:index.php");
        exit();
    }

}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="Styles/signup.css" >
        <script defer src="../Script/signup.js"></script>
    </head>

<center>         
<header>
    <img src="Images/signup1.png" alt="register" />
    <h1>Registration Application</h1>
</header>
</center>

<hr>
<body>
<div>
    

</div>
       <ul>
        <li><a class="active" href="https://loki.trentu.ca/~yasmeensaeed/3420/project/index.php">Home</a></li>
        <li><a href="#news">News</a></li>
        <li><a href="#contact">Contact</a></li>
        <li><a href="#about">About</a></li>
      </ul>

      <div style="margin-left:25%;padding:1px 16px;height:1000px;">
      <form action="<?=htmlentities($_SERVER['PHP_SELF']);?>" method="post" novalidate>

<div class="Name">
    <fieldset>
        <legend><strong>Full Name</strong> </legend>
    <div><lable for ="firstname">First name : </lable><input class="firstname_input" type="text" placeholder="Tom" name="first"></div>
    <div><lable for ="lastname">Last name : </lable><input class="lastname_input" type="text" placeholder="Smith" name="last"></div>
    </fieldset>
</div>

<div class="createPass">
    <fieldset>
    <legend><strong>Create Username & Password</strong> </legend>
    <div>
        <lable for ="password">Username : </lable><input class="username_input" type="text"  id="user" name="user"   value = "<?=$user?>" >
      <span class="<?=!isset($errors['user']) ? 'hidden' : "";?>">*Please enter a username</span>
    <span class="<?=!isset($errors['login']) ? 'hidden' : "";?>">*USERNAME IS TAKEN</span> 

</div>
    <div><lable for ="password">New Password : </lable><input class="password_input" type="text"  name="pass"  value="<?=$pass?>" placeholder="**********" ></div>
   
    <span class="<?=!isset($errors['pass']) ? 'hidden' : "";?>">*Please enter a password</span>

</fieldset>
</div>

<div class = "personal_info">
<fieldset>
    <legend><strong>Personal information</strong></legend>
    <div><lable for ="Current_weight">Current Weight : </lable><input class="weight1_input" type="text" placeholder="#kg" name="weight1"></div>
    <div><lable for ="Goal_weight">Goal Weight : </lable><input class="weight2_input" type="text" placeholder="#kg" name="weight2"></div>

    <label for="bdaymonth">Birthday (month and year) : </label>
    <input type="month" id="bdaymonth" name="bdaymonth">
    
  
    <div><lable for ="Age">Age : </lable><input class="age_input" type="text" placeholder="" name="age"></div>
    <div><lable for ="Height">Height : </lable><input class="height_input" type="text" placeholder="" name="height"></div>
    <div><lable for ="BMI">BMI : </lable><input class="BMI_input" type="text" placeholder="" name="BMI"></div>
</fieldset>
</div>

<div class = "address">
    <fieldset>
        <legend><strong>Address</strong></legend>
        <div><lable for ="Street_address">Street Address : </lable><input class="streetaddress_input" type="text" placeholder="" name="streetaddress"></div>
        <div ><label for="Province">Province : </label><select id="Province" name="Province">
            <option value="0">--select one--</option>
            <option value="1">Alberta</option>
            <option value="2">British Columbia</option>
            <option value="3">Manitoba</option>
            <option value="4">New Brunswick</option>
            <option value="5">Newfoundland</option>
            <option value="6">Nova Scotia</option>
            <option value="7">Ontario</option>
            <option value="8">Prince Edward Island</option>
            <option value="9">Quebec</option>
            <option value="10">Saskatchewan</option>
            <option value="11">Northweast Territories</option>
            <option value="12">Nunavut</option>
            <option value="13">Yukon</option>
            </select>
            <div><lable for ="city">city : </lable><input class="city_input" type="text" placeholder="" name="city"></div>
            <div><lable for ="postal">Postal / Zip Code : </lable><input class="postal_input" type="text" placeholder="" name="postal"></div>
        </div>
    </fieldset>

    <div class = "contact">
<fieldset>
    <legend><strong>Contact</strong></legend>

    <div><lable for ="email">Email Address:</lable><input class="email_input" type="text" placeholder="jamiesmith@gmail.com" id="email" name="email"  value="<?=$email?>" ></div>
    <div><lable for ="number">Phone Number:</lable><input class="phone_input" type="text" placeholder="000-000-0000" name="phone"></div>
    <span class="<?=!isset($errors['email']) ? 'hidden' : "";?>">*Please enter an email</span>

</fieldset>
    </div>

<hr>
<footer>
    <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

    <button type="submit" id="submit" name="submit" class="registerbtn">Register</button>
  </div>
  </form>
  
  <div class="container signin">
    <p>Already have an account? <a href="#">Sign in</a>.</p>
  </div>
</footer>

</main>
</body>
</html>