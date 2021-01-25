<?php

namespace Asada\lobbyproxycore\listener\tasks;

use pocketmine\{Player, Server};
use pocketmine\scheduler\Task;
use pocketmine\event\Listener;

use Asada\lobbyproxycore\Main;

class TitleTask extends Task implements Listener {
	
	public function __construct(Main $main, Player $player) {
		$this->main = $main;
		$this->player = $player;
	}
	
	public function onRun($currentTick){
		$config = $this->main->getConfigs();
		$title = $config->get("JoinTitle");
		$this->player->addTitle($title);
	}
}