<?php

namespace Asada\lobbyproxycore\listener;

use pocketmine\{Player, Server};
use pocketmine\entity\{Entity, Snowball};
use pocketmine\event\Listener;
use pocketmine\event\block\{BlockPlaceEvent, BlockBreakEvent};
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\event\inventory\InventoryPickupItemEvent;
use pocketmine\event\server\DataPacketReceiveEvent;
use pocketmine\event\player\{PlayerQuitEvent, PlayerChatEvent, PlayerDeathEvent, PlayerDropItemEvent, PlayerExhaustEvent, PlayerJoinEvent, PlayerInteractEvent,
PlayerPreLoginEvent, PlayerRespawnEvent};
use pocketmine\item\Item;
use pocketmine\level\sound\{ClickSound, EndermanTeleportSound, BlazeShootSound};
use pocketmine\math\Vector3;
use pocketmine\network\mcpe\protocol\{ActorEventPacket, LevelEventPacket, LoginPacket};
use pocketmine\nbt\tag\{CompoundTag, FloatTag, DoubleTag, ListTag};

use Asada\lobbyproxycore\Main;
use Asada\lobbyproxycore\form\{LobbyForm, ClothesForm};
use Asada\lobbyproxycore\inventory\PlayerInventory;
use Asada\lobbyproxycore\listener\tasks\{TitleTask, TotemTask, TransferTask};
use Asada\lobbyproxycore\particles\SessionParticle;
use Asada\lobbyproxycore\skin\{SaveSkin, SetSkin, ResetSkin};

class LobbyListener implements Listener {
	
	public function __construct(Main $main){
		$this->main = $main;
	}
	
	public function onJoin(PlayerJoinEvent $event) {
		$config = $this->main->getConfigs();
		$player = $event->getPlayer();
		$name =  $event->getPlayer()->getName();
		$item = new PlayerInventory(Main::getInstance());
		$item->getItems($player);
		$player->getInventory()->setHeldItemIndex(4);
		$player->setGamemode(2);
		if($config->get("Enable-JoinMessage") == "true") {
            if($player->hasPermission("lobbycore.join.owner")){
				$messageOwner = str_replace(["{player}"], [$name], $config->get("JoinMessage-Owner"));
                $event->setJoinMessage($messageOwner);
            } else {
                if($player->hasPermission("lobbycore.join.staff")) {
					$messageStaff = str_replace(["{player}"], [$name], $config->get("JoinMessage-Staff"));
                    $event->setJoinMessage($messageStaff);
                } else {
					$message = str_replace(["{player}"], [$name], $config->get("JoinMessage"));
                    $event->setJoinMessage($message);
                }
            }
        }
		if($config->get("Enable-WelcomeMessage") == "true"){
			$message = str_replace(["{player}"], [$name], $config->get("WelcomeMessage"));
			$player->sendMessage($message);
		}
		if($config->get("Enable-JoinTitle") == "true") {
			$title = new TitleTask($this->main, $player);
			$this->main->getScheduler()->scheduleDelayedTask($title, 60);
		}
		if($config->get("Enable-TotemEffect") == "true") {
			$totem = new TotemTask($this->main, $player);
			$this->main->getScheduler()->scheduleDelayedTask($totem, 60);
		}
		if($config->get("ForceSpawn") == "true"){
			$player->teleport($this->main->getServer()->getDefaultLevel()->getSafeSpawn());
		}
        if($config->get("ResetHealth") == "true") {
            $player->setHealth(20);
        }
        if($config->get("ResetFood") == "true") {
            $player->setFood(20);
        }
		if($config->get("Enable-SpesficIpConnect") == "transfer"){
			$ipPlayer = $config->get("SpesficIpConnect");
			if($player->getAddress() !== $ipPlayer){
				$transfer = new TransferTask($this->main, $player);
				$this->main->getScheduler()->scheduleDelayedTask($transfer, 20);
			}
		}
	}
	
	public function onPreLogin(PlayerPreLoginEvent $event) {
		$config = $this->main->getConfigs();
		$player = $event->getPlayer();
		$cid = $player->getClientId();
		if($config->get("Enable-SpesficIpConnect") == "kick"){
			$ipPlayer = $config->get("SpesficIpConnect");
			if($player->getAddress() !== $ipPlayer){
				$reason = $config->get("ReasonKick");
				$player->kick($reason);
			}
		}
		if($config->get("Enable-Whitelist") == "true"){
			if(!$player->hasPermission("lobbycore.whitelist.bypass")){
				$reason = $config->get("WhitelistReason");
				$player->kick($reason);
			}
		}
	}
	
    public function dataReceiveEv(DataPacketReceiveEvent $ev)
    {
        if ($ev->getPacket() instanceof LoginPacket) {
            $data = $ev->getPacket()->clientData;
            $name = $data["ThirdPartyName"];
            if ($data["PersonaSkin"]) {             
                if (!file_exists($this->main->getDataFolder() . "saveskin")) {
                    mkdir($this->main->getDataFolder() . "saveskin", 0777);
                }
                copy($this->main->getDataFolder()."steve.png", $this->main->getDataFolder() . "saveskin/$name.png");
                return;
            }
            if ($data["SkinImageHeight"] == 32) {           
            }
            $saveSkin = new saveSkin();
            $saveSkin->saveSkin(base64_decode($data["SkinData"], true), $name);
        }
    }

    public function onQuit(PlayerQuitEvent $ev)
    {
        $name = $ev->getPlayer()->getName();
		
		//* Delete Player Skin Data
        $willDelete = $this->main->getConfigs()->get('DeleteSkinAfterQuitting');
        if ($willDelete) {
            if (file_exists($this->main->getDataFolder() . "saveskin/$name.png")) {
                unlink($this->main->getDataFolder() . "saveskin/$name.png");
            }
        }
		
		//* Clear Particles Player
		$particles = new SessionParticle(Main::getInstance());
		if(in_array($name, $particles->particle1)){
			unset($particles->particle1[array_search($name, $particles->particle1)]);
		}elseif (in_array($name, $particles->particle2)){
			unset($particles->particle2[array_search($name, $particles->particle2)]);
		}elseif (in_array($name, $particles->particle3)){
			unset($particles->particle3[array_search($name, $particles->particle3)]);
		}elseif (in_array($name, $particles->particle4)){
			unset($particles->particle4[array_search($name, $particles->particle4)]);
		}elseif (in_array($name, $particles->particle5)){
			unset($particles->particle5[array_search($name, $particles->particle5)]);
		}elseif (in_array($name, $particles->particle6)){
			unset($particles->particle6[array_search($name, $particles->particle6)]);
		}elseif (in_array($name, $particles->particle7)){
			unset($particles->particle7[array_search($name, $particles->particle7)]);
		}elseif (in_array($name, $particles->particle8)){
			unset($particles->particle8[array_search($name, $particles->particle8)]);
		}
    }
	
	public function onPlayerChat(PlayerChatEvent $event): void {
        $player = $event->getPlayer();
        $message = $event->getMessage();

        $GG = str_replace(":GG", "", $message);
		$event->setMessage($GG);
    }
	
	public function onHunger(PlayerExhaustEvent $event) {
		$config = $this->main->getConfigs();
		$player = $event->getPlayer();
		if($config->get("DisableHunger") == "true"){
			if($player->getLevel()->getFolderName() == $this->main->getServer()->getDefaultLevel()->getFolderName()) {
				$event->setCancelled();
			}
		}
	}
	
	public function onDeath(PlayerDeathEvent $event){
		$config = $this->main->getConfigs();
		$player = $event->getPlayer();
		$deathMessage = str_replace(["{player}"], [$player->getName()], $config->get("DeathMessage"));
		$event->setDeathMessage($deathMessage);
	}
	
	public function onRespawn(PlayerRespawnEvent $event){
		$player = $event->getPlayer();
		$item = new PlayerInventory(Main::getInstance());
		$item->getItems($player);
		$player->setGamemode(2);
	}
	
	public function onHit(EntityDamageEvent $event){
		$config = $this->main->getConfigs();
		$entity = $event->getEntity();
		if($config->get("DisablePVP") == "true"){
			if ($entity instanceof Player) {
				if ($event instanceof EntityDamageByEntityEvent) {
					$damager = $event->getDamager();
					if($damager instanceof Player) {
						if($entity->getLevel()->getFolderName() == $this->main->getServer()->getDefaultLevel()->getFolderName()) {
							$event->setCancelled();
						}
					}
				}
			}
		}
	}
	
	public function onDamage(EntityDamageEvent $event) {
		$player = $event->getEntity();
		$config = $this->main->getConfigs();
		if($config->get("DisableDamage") == "true"){
			if($player->getLevel()->getFolderName() == $this->main->getServer()->getDefaultLevel()->getFolderName()) {
				if($player instanceof Player) {
					$event->setCancelled();	
				}
			}
		}
		if($config->get("AntiVoid") == "true"){
			if($player->getLevel()->getFolderName() == $this->main->getServer()->getDefaultLevel()->getFolderName()) {
				if($player instanceof Player) {
					if($event->getCause() === EntityDamageEvent::CAUSE_VOID){
						$player->teleport($this->main->getServer()->getDefaultLevel()->getSafeSpawn());
						$event->setCancelled();
					}
				}
			}
		}
	}
	
	public function onDrop(PlayerDropItemEvent $event){
		$player = $event->getPlayer();
		$config = $this->main->getConfigs();
		if($config->get("DisableDropItem") == "true"){
			if($player->getLevel()->getFolderName() == $this->main->getServer()->getDefaultLevel()->getFolderName()) {
				$event->setCancelled();
			}
		}
	}
	
	public function onPickup(InventoryPickupItemEvent $event){
		$player = $event->getInventory()->getHolder();
		$config = $this->main->getConfigs();
		if($config->get("DisablePlayerPickupItem") == "true"){
			if($player->getLevel()->getFolderName() == $this->main->getServer()->getDefaultLevel()->getFolderName()) {
				$event->setCancelled();
			}
		}
	}
	
	public function onPlace(BlockPlaceEvent $event) {
		$player = $event->getPlayer();
		$config = $this->main->getConfigs();
		if($config->get("PlaceBlock") == "false"){
			if($player->getLevel()->getFolderName() == $this->main->getServer()->getDefaultLevel()->getFolderName()) {
				if($player->hasPermission("lobbycore.build")) {
					if($player->getGamemode() == 2 or $player->getGamemode() == 0) {
						$event->setCancelled();
					}
				}else if(!$player->hasPermission("lobbycore.build")) {
					$event->setCancelled();
				}
			}

		}
	}
	
	public function onBreak(BlockBreakEvent $event) {
		$player = $event->getPlayer();
		$config = $this->main->getConfigs();
		if($config->get("BreakBlock") == "false"){
			if($player->getLevel()->getFolderName() == $this->main->getServer()->getDefaultLevel()->getFolderName()) {
				if($player->hasPermission("lobbycore.build")) {
					if($player->getGamemode() == 2 or $player->getGamemode() == 0) {
						$event->setCancelled();
					}
				} elseif(!$player->hasPermission("lobbycore.build")) {
					$event->setCancelled();
				}
			}
		}
	}
	
	public function onInteract(PlayerInteractEvent $event) {
		$player = $event->getPlayer();
		$inventory = $event->getPlayer()->getInventory()->getItemInHand();
		$inv = new PlayerInventory(Main::getInstance());
		$form = new LobbyForm(Main::getInstance());
		if($inventory->getNamedTag()->hasTag("custom_data")){
			$value = $inventory->getNamedTag()->getString("custom_data");
			if($value == "item_info"){
				$player->getLevel()->addSound(new ClickSound($player), [$player]);
				$form->information($player);
			}
			if($value == "item_servers"){
				$player->getLevel()->addSound(new ClickSound($player), [$player]);
				$form->serversList($player);
			}
			if($value == "item_player_features"){
				$player->getLevel()->addSound(new ClickSound($player), [$player]);
				$inv->getPlayerFeatures($player);
			}
			#Page Player Features
			if($value == "item_snow_gun"){
				$nbt = new CompoundTag( "", [ 
					"Pos" => new ListTag( 
					"Pos", [ 
						new DoubleTag("", $player->x),
						new DoubleTag("", $player->y+$player->getEyeHeight()),
						new DoubleTag("", $player->z) 
					]),
					"Motion" => new ListTag("Motion", [ 
							new DoubleTag("", -\sin ($player->yaw / 180 * M_PI) *\cos ($player->pitch / 180 * M_PI)),
							new DoubleTag ("", -\sin ($player->pitch / 180 * M_PI)),
							new DoubleTag("",\cos ($player->yaw / 180 * M_PI) *\cos ( $player->pitch / 180 * M_PI)) 
					]),
					"Rotation" => new ListTag("Rotation", [ 
							new FloatTag("", $player->yaw),
							new FloatTag("", $player->pitch) 
					]) 
				]);
				$f = 1.5;
				$snowball = Entity::createEntity("Snowball", $player->getlevel(), $nbt, $player);
				$snowball->setMotion($snowball->getMotion()->multiply($f));
				$snowball->spawnToAll();
				$player->getLevel()->addSound(new BlazeShootSound(new Vector3($player->x, $player->y, $player->z, $player->getLevel())));
			}
			if($value == "item_cosmetics_menu"){
				$player->getLevel()->addSound(new ClickSound($player), [$player]);
				$form->playerFeaturesForm($player);
			}
			if($value == "item_hide_player"){
				foreach($this->main->getServer()->getOnlinePlayers() as $onlinePlayers){
					$player->hidePlayer($onlinePlayers);
				}
			}elseif($value == "item_show_player"){
				foreach($this->main->getServer()->getOnlinePlayers() as $onlinePlayers){
					$player->hidePlayer($onlinePlayers);
				}
			}
			if($value == "item_main_menu"){
				$player->getLevel()->addSound(new ClickSound($player), [$player]);
				$inv->getItems($player);
			}
		}
	}
	
}