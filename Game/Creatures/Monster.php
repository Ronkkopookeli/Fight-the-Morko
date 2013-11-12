<?php
// The Monster class.
class Monster{
	// Fields.
	private $name;
	private $picture;
	private $damage;
	// Protected so they can be accessed by inherited classes.
	protected $maxHealth;
	protected $currentHealth;
	
	// Constructor.
	public function __construct($name, $maxHealth, $picture, $damage){
		$this->name = $name;
		$this->maxHealth = $maxHealth;
		$this->currentHealth = $maxHealth;
		$this->picture = $picture;
		$this->damage = $damage;
	}
	
	// Deal damage to this monster.
	public function doDamage($damage){
		$this->currentHealth -= $damage;
	}
	
	// Get the base damage of this monster.
	public function getDamage()
	{
		return $this->damage;
	}
	
	// Get the url to this monsters picture.
	public function getPicture(){
		return "<img src=\"Pictures/" . $this->picture . ".jpg\" width=\"200\"  height=\"150\" alt=\"Picture of the monster\" />";
	}
	
	// Get the current health of this monster.
	public function getHealth(){
		return $this->currentHealth;
	}
	
	// Get the maximum health of this monster.
	public function getMaxHealth(){
		return $this->maxHealth;
	}
	
	// Get the name of this monster.
	public function getName(){
		return $this->name;
	}
}
?>