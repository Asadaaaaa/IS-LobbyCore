<?php

namespace Asada\lobbyproxycore\listener\tasks;

use pocketmine\{Player, Server};
use pocketmine\network\mcpe\protocol\{ActorEventPacket, LevelEventPacket};
use pocketmine\scheduler\Task;

use Asada\lobbyproxycore\Main;

class TotemTask extends Task {
	
	public function __construct(Main $main, Player $player) {
		$this->main = $main;
		$this->player = $player;
	}
	
	public function onRun($currentTick){
		#$this->player->getInventory()->setHeldItemIndex(3);
		#$this->player->getInventory()->setItemInHand(Item::get(450,0,1));
		$this->player->broadcastEntityEvent(ActorEventPacket::CONSUME_TOTEM);		
		$pk = new LevelEventPacket();
		$pk->evid = LevelEventPacket::EVENT_SOUND_TOTEM;
		$pk->position = $this->player->add(0, $this->player->eyeHeight, 0);
		$pk->data = 0;
		$this->player->dataPacket($pk);
		#$this->player->getInventory()->setItemInHand(Item::get(0,0,1));
		#$this->player->getInventory()->setHeldItemIndex(4);
	}
}