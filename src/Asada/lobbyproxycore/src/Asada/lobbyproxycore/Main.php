<?php

namespace Asada\lobbyproxycore;

use pocketmine\{Player, Server};
use pocketmine\command\{CommandSender, Command};
use pocketmine\event\Listener;
use pocketmine\network\mcpe\protocol\ScriptCustomEventPacket;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\{Binary, Config};

use Asada\lobbyproxycore\listener\LobbyListener;
use Asada\lobbyproxycore\form\{LobbyForm, ClothesForm};
use Asada\lobbyproxycore\particles\{WorldParticles, PlayerParticles, SessionParticle};
use Asada\lobbyproxycore\skin\{SaveSkin, SetSkin, ResetSkin};

class Main extends PluginBase implements Listener{
	
	private static $instance;
	
	private $lobbyForm;
	
	public $particle1 = [];
	public $particle2 = [];
	public $particle3 = [];
	public $particle4 = [];
	public $particle5 = [];
	public $particle6 = [];
	public $particle7 = [];
	public $particle8 = [];
	
	public static function getInstance(): Main {
        return self::$instance;
    }
	
	public function onLoad(){
		self::$instance = $this;
		@mkdir($this->getDataFolder());
		$this->saveResource("config.yml");
		$this->saveResource("steve.json");
		$this->saveResource("steve.png");
		if (!file_exists($this->getDataFolder() . "clothes")) {
            mkdir($this->getDataFolder() . "clothes", 0777);
        }
		if (!file_exists($this->getDataFolder() . "saveskin")) {
            mkdir($this->getDataFolder() . "saveskin", 0777);
        }
	}
	
	public function onEnable(){
		$this->getServer()->getPluginManager()->registerEvents(new LobbyListener($this), $this);
		$this->getScheduler()->scheduleRepeatingTask(new WorldParticles($this), 10);
		$this->getScheduler()->scheduleRepeatingTask(new PlayerParticles($this), 10);
		$this->lobbyForm = new LobbyForm($this);
		$this->getServer()->getDefaultLevel()->setTime(9000);
		$this->getServer()->getDefaultLevel()->stopTime();
	}
	
	public function getConfigs(){
		return new Config($this->getDataFolder() . "config.yml", Config::YAML);
	}
	
	public function onCommand(CommandSender $sender, Command $command, string $label, array $args) : bool
	{
		switch(strtolower($command->getName())){
			case "store":
			if(!$sender instanceof Player){
				$sender->sendMessage("§cThis command only work in game");
				return true;
			}
			$this->lobbyForm->storeCatalog($sender);
			break;
		}
		return true;
	}
	
	public function getLobbyForm(): LobbyForm {
		return $this->lobbyForm;
	}
	
	public function transfer(Player $player, String $server): bool
    {
        $pk = new ScriptCustomEventPacket();
        $pk->eventName = "bungeecord:main";
        $pk->eventData = Binary::writeShort(strlen("Connect")) . "Connect" . Binary::writeShort(strlen($server)) . $server;
        $player->sendDataPacket($pk);
        return true;
    }
	
}