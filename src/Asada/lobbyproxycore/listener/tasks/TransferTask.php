<?php

namespace Asada\lobbyproxycore\listener\tasks;

use pocketmine\{Player, Server};
use pocketmine\scheduler\Task;
use pocketmine\event\Listener;

use Asada\lobbyproxycore\Main;

class TransferTask extends Task implements Listener {
	
	private $main;
	private $player;
	
	public function __construct(Main $main, Player $player) {
		$this->main = $main;
		$this->player = $player;
	}
	
	public function onRun($currentTick){
		$config = $this->main->getConfigs();
		$ipServer = $config->get("IpTransferServer");
		$portServer = $config->get("PortTransferServer");
		$this->player->transfer($ipServer, $portServer);
		$reason = str_replace(["{player}"], [$this->player->getName()], $config->get("TransferReason"));
		$this->main->getServer()->getLogger()->info($reason);
		foreach($this->main->getServer()->getOnlinePlayers() as $player){
			if($player->hasPermission("lobbycore.transfer.reason")){
				$player->sendMessage($reason);
			}
		}
	}
}