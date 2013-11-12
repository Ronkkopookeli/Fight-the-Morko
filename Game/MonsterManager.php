<?php
// Includes.
require_once("./Game/Creatures/Player.php");
require_once("./Game/Creatures/Monster.php");

// MonsterManager class is a game component that holds data about the current monster and player.
class MonsterManager
{
	// Current monster object.
	private $currentMonster;
	// Player object.
	private $player;
	// Monster kill counter.
	private $counter;
	
	// Constructor.
	public function __construct()
	{
		// New player (Name, Health, Image URL, Base damage).
		$this->player = new Player("Player", 100, "player", 12);
		// Create new monster.
		$this->createMonster();
		// Set counter to zero.
		$this->counter = 0;
	}
	
	// Create a monster.
	public function createMonster()
	{
		// (Name, Health, Image URL, Base damage).
		$this->currentMonster = new Monster("Mörkö" ,100, "morko", 10);
	}
	
	// Get the current monster object.
	public function getCurrentMonster()
	{
		return $this->currentMonster;
	}
	
	// Get the current player object.
	public function getPlayer()
	{
		return $this->player;
	}
	
	// Get the counter.
	public function getCounter()
	{
		return $this->counter;
	}
	
	// Increase counter by 1.
	public function incCounter()
	{
		$this->counter += 1;
	}
	
	// Destroy current monster.
	public function destroyCurrentMonster()
	{
		unset($this->currentMonster);
	}
}
?>