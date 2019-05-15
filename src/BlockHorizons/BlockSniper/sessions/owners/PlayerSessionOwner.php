<?php

namespace BlockHorizons\BlockSniper\sessions\owners;

use pocketmine\Player;
use pocketmine\Server;

class PlayerSessionOwner implements ISessionOwner{

	/** @var string */
	private $playerName = "";

	public function __construct(string $playerName){
		$this->playerName = $playerName;
	}

	/**
	 * @return null|Player
	 */
	public function getPlayer() : ?Player{
		return Server::getInstance()->getPlayer($this->playerName);
	}

	/**
	 * @return string
	 */
	public function getName() : string{
		return $this->playerName;
	}

	/**
	 * @param string $message
	 */
	public function sendMessage(string $message) : void{
		// This may seem unintuitive, but we generally send popups over chat messages.
		$player = $this->getPlayer();
		if($player !== null){
			$player->sendPopup($message);
		}
	}
}