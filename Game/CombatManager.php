<?php
// CombatManager class is a game component that only holds one static method which 
// will calculate current turns combat.
class CombatManager
{
	// We need data from monsterManager object and we also need to save messages
	// to messageManager object. Get the objects as function parameters.
	public static function fight($monsterManager, $messageManager)
	{
		// Get monsters base damage and add random element to it.
		$damageMonster = $monsterManager->getCurrentMonster()->getDamage() + rand(-5,5);
		// Get players base damage and add random element to it.
		$damagePlayer = $monsterManager->getPlayer()->getDamage() + rand(-5,5);
		// Deal damage to the monster.
		$monsterManager->getCurrentMonster()->doDamage($damagePlayer);
		// Deal damage to the player.
		$monsterManager->getPlayer()->doDamage($damageMonster);
		
		// Add damage to messages.
		$messageManager->addMessage($monsterManager->getCurrentMonster()->getName() . " hits " 
			. $monsterManager->getPlayer()->getName() . " for $damageMonster damage.");
		$messageManager->addMessage($monsterManager->getPlayer()->getName() . " hits " 
			. $monsterManager->getCurrentMonster()->getName() . " for $damagePlayer damage.");
		
		// If both monster and player has zero or less health.
		if($monsterManager->getCurrentMonster()->getHealth() <= 0 
			&& $monsterManager->getPlayer()->getHealth() <= 0)
		{
			// Message: This battle was a draw but the game ends.
			$messageManager->addMessage($monsterManager->getPlayer()->getName() . " dies but manages to defeat " 
				. $monsterManager->getCurrentMonster()->getName() . ". Game over!");
			// Increase the monster kill counter.
			$monsterManager->incCounter();
		}
		// Else if monster health is zero or less and player health is greater than zero.
		else if($monsterManager->getCurrentMonster()->getHealth() <= 0 && $monsterManager->getPlayer()->getHealth() > 0)
		{
			// Destroy the current monster object.
			$monsterManager->destroyCurrentMonster();
			// Create new monster.
			$monsterManager->createMonster();
			// Increase the monster kill counter.
			$monsterManager->incCounter();
			// Heal the player to full health.
			$monsterManager->getPlayer()->healPlayer();
			// Add message about what just happened.
			$messageManager->addMessage($monsterManager->getCurrentMonster()->getName() . " dies. You win! You are healed! New monster emerges!");
		}
		// Else if player health is zero or less and monster health is greater than zero.
		else if($monsterManager->getPlayer()->getHealth() <= 0 && $monsterManager->getCurrentMonster()->getHealth() > 0)
		{
			// Message: Game over.
			$messageManager->addMessage($monsterManager->getPlayer()->getName() . " dies. You lose! Game over!");
		}
	}
}
?>