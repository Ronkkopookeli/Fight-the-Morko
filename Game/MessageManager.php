<?php
// MessageManager class is a game component that holds all the message data.
class MessageManager
{
	// Array to hold all the messages.
	private $messages = array();
	
	// Add new message to the messages array.
	public function addMessage($message)
	{
		// We put the new messages in front of the array.
		array_unshift($this->messages, $message);
		// We only want to save first 6 messages in the array.
		$this->messages = array_slice($this->messages, 0, 6);
	}
	
	// Get all the messages.
	public function getMessages()
	{
		// Loop through all the messages.
		for($i = 0; $i < count($this->messages); $i++)
		{
			// Save messages to $temp.
			$temp .= $this->messages[$i] . "<br>";
		}
		return $temp;
	}
}
?>