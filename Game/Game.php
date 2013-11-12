<?php
// Include game classes.
require_once("./Game/MonsterManager.php");
require_once("./Game/MessageManager.php");
require_once("./Game/CombatManager.php");

/*
 * Game class is a container class for the whole game.
 */
class Game
{
	// This game component will store all monster related information.
	private $monsterManager;
	// This game component will store all messages.
	private $messageManager;
	
	// Constructor
	public function __construct()
	{
		// Create the game components.
		$this->monsterManager = new MonsterManager();
		$this->messageManager = new MessageManager();
	}
	
	// Calculate this turns combat.
	public function fight()
	{
		// CombatManager is static game component. Here we call its static method fight(), which uses
		// monsterManager and messageManager game components.
		CombatManager::fight($this->monsterManager, $this->messageManager);
	}
	
	// Echo the game screen as html.
	public function draw()
	{
		// We get all the needed information from the monsterManager game component.
		$temp = '
		<form action="' . $_SERVER['PHP_SELF'] . '" method="post" >
			<div id="container">
				<div id="map">
					<div id="enemy">
						<h3>' . $this->monsterManager->getCurrentMonster()->getName() . '</h3>
						' . $this->monsterManager->getCurrentMonster()->getPicture() . '
						<p>Health: ' . $this->monsterManager->getCurrentMonster()->getHealth() . ' / ' 
						. $this->monsterManager->getCurrentMonster()->getMaxHealth() . '</p>
					</div>
					<div id="player">
						<h3>' . $this->monsterManager->getPlayer()->getName() . '</h3>
						' . $this->monsterManager->getPlayer()->getPicture() . '
						<p>Health: ' . $this->monsterManager->getPlayer()->getHealth() . ' / ' 
						. $this->monsterManager->getPlayer()->getMaxHealth() . '</p>
					</div>			
				</div>
				<div id="interface">
					<button type="submit" name="fight" '; 
					/*
					 * Disable FIGHT-button if player has zero or less health.
					 */
					if($this->monsterManager->getPlayer()->getHealth() <= 0) $temp .= 'disabled="disabled"';
					
					// Get the monster kill counter and all the messages.
				$temp .= '>FIGHT</button>
					<button type="submit" name="reset">RESET</button>
					<br><p>You have defeated '. $this->monsterManager->getCounter() .' monsters.</p>
				</div>
				<div id="messages">
					<p>' . $this->messageManager->getMessages() . '</p>
				</div>
			</div>
		</form>
			';
		echo($temp);
	}
}
?>