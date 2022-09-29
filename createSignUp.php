<?php

session_start();


include "Includes/library.php";

//empty array declared
$errors = array();

//Variable naming
$Title = $_POST['Title'] ?? null;
$description = $_POST['description'] ?? null;
$date = $_POST['date'] ?? null;
$time = $_POST['time'] ?? null;
$Searchable= $_POST['status'] ?? null;

$username =  $_SESSION['username'] ;

$pdo = connectdb();


if (isset($_POST['submit'])) { //if submiitted


    
  if(!isset($Title) || strlen($Title) === 0)
  {
      $errors['Title'] = true;
  }
  
  if (!isset($description) || strlen($description) === 0 ) {
      $errors['pass'] = true;
  }

  if (!isset($date) || strlen($date) === 0 ) {
    $errors['date'] = true;
     }


if (!isset($time) || strlen($time) === 0 ) {
  $errors['time'] = true;
}

if (empty($Searchable)) {
  $errors['Searchable'] = true;
}

  if (count($errors) === 0) {


    $query = "INSERT INTO `GYMCLASS` values (NULL, ?,?,?,?,?)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$Title, $description, $date, $time, $Searchable]);
    
    $_SESSION['Title'] = $_POST['Title'];
    $_SESSION['description'] = $_POST['description'];  
    $_SESSION['date'] = $_POST['date'];
    $_SESSION['time'] = $_POST['time'];
    $_SESSION['Searchable'] = $_POST['Searchable'];


    //send the user to the thankyou page.
    header("Location:index.php");
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
            <div class="centered"> Add a class !</div>
          </div>
    
   <div class = "sidenav">
      <ul class= "sidenavigate">
        <li><a class="active" href="https://loki.trentu.ca/~yasmeensaeed/3420/project/personalPage/personal.php">Home</a></li>
        <li><a href="#news">Edit Account</a></li>
        <li><a href="#contact">Delete Account</a></li>
        <li class="sn"><a href="https://loki.trentu.ca/~yasmeensaeed/3420/project/index.php">Log Out</a></li>
      </ul>
</div>
 

<section class="UP">

    <h2>Hello <?php echo $username; ?></h2>

</section>
<form action="<?=htmlentities($_SERVER['PHP_SELF']);?>" method="post" novalidate>
<section class="SUchart">

<div>
            <label for="Title">Title:</label>
            <input
              id="Title"
              name="Title"
              type="text"
              placeholder="ex. looping"
              value="<?=$Title?>" 
              />
            <span class="error <?=!isset($errors['Title']) ? 'hidden' : "";?>">Please enter a Title</span>
          </div>
          <div>
            <label for="description">Description:</label>
            <input
              id="description"
              name="description"
              type="text"
              placeholder="ex. 1 hour class that focuses on the core."
              required
              value="<?=$description?>"
            />
            <span class="error <?=!isset($errors['description']) ? 'hidden' : "";?>">Please enter a description</span>
          </div>
          <div>
          <label for="date">Date:</label>
          <input type="date"
              id="date"
              name="date"
              placeholder="ex. 11/11/2021"
              required
              value="<?=$date?>"
              />
              <span class="error <?=!isset($errors['date']) ? 'hidden' : "";?>">Please pick a date</span>
          </div>

          <div>
          <label for="time">Time:</label>
          <input type="time"
              id="time"
              name="time"
              placeholder="ex. 12:00 PM"
              required
              value="<?=$time?>"
              />
              <span class="error <?=!isset($errors['time']) ? 'hidden' : "";?>">Please pick a date</span>
          </div>
          <fieldset class="search">
          <div>
            <legend>Searchable?</legend>

            <div>
              <input id="Yes" name="status" type="radio" value="Y" <?=$Searchable == "Y" ? 'checked' : ''?> />
              <label for="Yes">Yes</label>
            </div>
            <div>
              <input id="No" name="status" type="radio" value="N"  <?=$Searchable == "N" ? 'checked' : ''?> />
              <label for="No">No</label>
            </div>
            <span class="error <?=!isset($errors['Searchable']) ? 'hidden' : "";?>">Please select one</span>
          </fieldset>
          <div>
          <div>
          <button name="submit" id="submit"> CREATE </button>
          </div>
</section>
</form>
</body>
</html>