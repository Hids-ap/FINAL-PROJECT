<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Project</title>
    <link rel="stylesheet" href="Styles/main.css"/>

</head>

<header>
    <img src="Images/bannergym.png" alt="1">

    <div id="myNav" class="overlay">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <div class="overlay-content">
          <a href="https://loki.trentu.ca/~yasmeensaeed/3420/project/login.php">Login</a>
          <a href="#">About</a>
          <a href="#">Services</a>
          <a href="#">Clients</a>
          <a href="#">Contact</a>
        </div>
      </div>
      <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>

      <script>
      function openNav() {
        document.getElementById("myNav").style.width = "100%";
      }
      
      function closeNav() {
        document.getElementById("myNav").style.width = "0%";
      }
      </script>

</header>
<body>
    <div class="para">
        <div class="box" style="background-color:#bbb">
            <h1>GET FIT WITH US</h1>
            <p> Yoga, Swimming, Fitness and more </p>
            <img src="Images/verticalmain1.png" alt="1">
            <button class="join" type="join"><a href="https://loki.trentu.ca/~yasmeensaeed/3420/project/signup.php">JOIN NOW</a></button>
            <button class="join" type="join"><a href="https://loki.trentu.ca/~yasmeensaeed/3420/project/login.php">LOGIN</a></button>
        </div>



        <div class="box" style="background-color:#ccc">
            
                <i class="fas fa-dumbbell fa-5x"  style='font-size:24px'></i>
               <h3> Train With A Professional </h3>
               <p>
                   Book a session with one of our professional coaches to help improve your workout journey.
               </p>
               <img src="Images/verticalmain2.png" alt="2">
               <button class="join" type="join"><a href="https://loki.trentu.ca/~yasmeensaeed/3420/project/signup.php">JOIN NOW</a></button>


        </div>




     <div class="box" style="background-color:#ddd">
        <h4>Pool Access </h4>
     <p>Unlimited pool access for all silver and gold members.</p>
     <img src="Images/verticalmain3.png" alt="3">
     <button class="join" type="join"><a href="https://loki.trentu.ca/~yasmeensaeed/3420/project/signup.php">JOIN NOW</a></button>



     </div>
    </div>
    



      <footer>
        <span>&copy; 2021 - COIS 3420 Project</span>
   </footer>

</body>

</html>