<?php

include 'calendar.php';

$calendar = new view('2021-02-08');

$calendar->add_event('Bootcamp', '2021-02-03', 1, 'blue');

$calendar->add_event('Body tone', '2021-02-04', 1, 'red');

$calendar->add_event('Weight Lifting', '2021-02-16', 7, 'orange');

?>

<!DOCTYPE html>

<html>

<head>

		<meta charset="utf-8">

		<title>Event Calendar</title>

		<link href="style.css" rel="stylesheet" type="text/css">

		<link href="calendar.css" rel="stylesheet" type="text/css">

	</head>
	<body>
	    <nav class="navtop">
	    	<div>

	    		<h1>Sign up view </h1>
	    
            </div>
	    
        </nav>
		
        <div class="content home">
		
        <?=$calendar?>
		
    </div>
	</body>
</html>