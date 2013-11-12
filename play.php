<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="play.css">
		<title>Fight the Mörkö</title>
	</head>
	<body>
		<?php
			// Include game class.
			include_once("./Game/Game.php");
			// Create new session so we can save the game object on the server.
			session_start();
			// If we don't have the game object in session yet, create a new one.
			if(!$_SESSION['game']) $game = new Game();
			// Else get the game object from the session.
			else $game = $_SESSION['game'];
			
			/*
			 * Here we use isset to check which button has been pressed.
			 */
			 
			// Fight button pressed.
			if(isset($_POST['fight']))
			{
				// This will calculate this turns combat.
				$game->fight();
			}
			
			// Reset button pressed.
			if(isset($_POST['reset']))
			{
				// Destroy the current session (destroy all saved data).
				session_destroy();
				// Create new game object.
				$game = new Game();
			}
			
			// Save the game object to the session.
			$_SESSION['game'] = $game;
			// Echo the html code to draw the game.
			$game->draw();
		?>
	</body>
</html>
