<?php
require_once("./Game/Creatures/Monster.php");

// Player class is derived from the Monster class.
class Player extends Monster
{
	// Constructor.
	public function __construct($name, $maxHealth, $picture, $damage)
	{
		parent::__construct($name, $maxHealth, $picture, $damage);
	}
	
	// Heal player to full health.
	public function healPlayer()
	{
		$this->currentHealth = $this->maxHealth;
	}
}
?>