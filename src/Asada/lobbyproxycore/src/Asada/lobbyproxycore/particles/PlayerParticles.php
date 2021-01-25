<?php

namespace Asada\lobbyproxycore\particles;

use pocketmine\{Player, Server};
use pocketmine\utils\{Config, TextFormat};
use pocketmine\scheduler\Task;

use pocketmine\level\particle\{FlameParticle, SplashParticle, HeartParticle, PortalParticle, LavaParticle, AngryVillagerParticle, WaterParticle, GenericParticle};

use pocketmine\math\Vector3;
use pocketmine\level\Level;
use pocketmine\level\Position;

use Asada\lobbyproxycore\Main;
use Asada\lobbyproxycore\form\ParticlesForm;

class PlayerParticles extends Task {
	
	public function __construct(Main $plugin){
		$this->plugin = $plugin;
	}
	
	public function onRun($task){
		$particles = new ParticlesForm(Main::getInstance());
		foreach($this->plugin->getServer()->getOnlinePlayers() as $pl){
			$name = $pl->getPlayer()->getName();
			$level = $pl->getLevel();
			$player = $pl->getPlayer();
			$players = $player->getLevel()->getPlayers();
			if(in_array($name, $this->plugin->particle1)){
				$x = $player->getX();
				$y = $player->getY();
				$z = $player->getZ();
				$center = new Vector3($x, $y, $z);
				for($yaw = 0; $yaw <= 10; $yaw += (M_PI * 2) / 20){
					$x = -sin($yaw) + $center->x;
					$z = cos($yaw) + $center->z;
					$y = $center->y;
					$level->addParticle(new FlameParticle(new Vector3($x, $y + 1.5, $z))); 
				}
			}
			if(in_array($name, $this->plugin->particle2)){
				$x = $player->getX();
				$y = $player->getY();
				$z = $player->getZ();
				$center = new Vector3($x, $y, $z);
				for($yaw = 0; $yaw <= 10; $yaw += (M_PI * 2) / 20){
					$x = -sin($yaw) + $center->x;
					$z = cos($yaw) + $center->z;
					$y = $center->y;
					$level->addParticle(new SplashParticle(new Vector3($x, $y + 1.5, $z))); 
				}
			}
			if(in_array($name, $this->plugin->particle3)){
				$x = $player->getX();
				$y = $player->getY();
				$z = $player->getZ();
				$center = new Vector3($x, $y, $z);
				for($yaw = 0; $yaw <= 10; $yaw += (M_PI * 2) / 20){
					$x = -sin($yaw) + $center->x;
					$z = cos($yaw) + $center->z;
					$y = $center->y;
					$level->addParticle(new HeartParticle(new Vector3($x, $y + 1.5, $z))); 
				}
			}
			if(in_array($name, $this->plugin->particle4)){
				$x = $player->getX();
				$y = $player->getY();
				$z = $player->getZ();
				$center = new Vector3($x, $y, $z);
				for($yaw = 0; $yaw <= 10; $yaw += (M_PI * 2) / 20){
					$x = -sin($yaw) + $center->x;
					$z = cos($yaw) + $center->z;
					$y = $center->y;
					$level->addParticle(new PortalParticle(new Vector3($x, $y + 1.5, $z))); 
				}
			}
			if(in_array($name, $this->plugin->particle5)){
				$x = $player->getX();
				$y = $player->getY();
				$z = $player->getZ();
				$center = new Vector3($x, $y, $z);
				for($yaw = 0; $yaw <= 10; $yaw += (M_PI * 2) / 20){
					$x = -sin($yaw) + $center->x;
					$z = cos($yaw) + $center->z;
					$y = $center->y;
					$level->addParticle(new LavaParticle(new Vector3($x, $y + 1.5, $z))); 
				}
			}
			if(in_array($name, $this->plugin->particle6)){
				$x = $player->getX();
				$y = $player->getY();
				$z = $player->getZ();
				$center = new Vector3($x, $y, $z);
				for($yaw = 0; $yaw <= 10; $yaw += (M_PI * 2) / 20){
					$x = -sin($yaw) + $center->x;
					$z = cos($yaw) + $center->z;
					$y = $center->y;
					$level->addParticle(new AngryVillagerParticle(new Vector3($x, $y + 1.5, $z))); 
				}
			}
			if(in_array($name, $this->plugin->particle7)) {
				$x = $player->getX();
				$y = $player->getY();
				$z = $player->getZ();
				$center = new Vector3($x, $y+0.5, $z);
	            $particle = new FlameParticle($center);
				$direction = $player->getDirectionVector();
				for($i = 0; $i < 40; ++$i){
					$x = $i*$direction->x+$player->x;
	                $y = $i*$direction->y+$player->y;
	                $z = $i*$direction->z+$player->z;
					
	                $particle->setComponents($x, $y+0.5, $z);
	                $level->addParticle($particle);
				}
	        }
			if(in_array($name, $this->plugin->particle8)){
				$x = $player->getX();
				$y = $player->getY();
				$z = $player->getZ();
				$r = 0;
				$g = 255;
				$b = 0;
				$level = $player->getLevel();
				$playerPosition = $player->getPosition()->add(0, 1.2, 0);
		switch($player->getDirection()){
        case 0:
$position = $playerPosition->add(-0.5, 1.4, 0.8); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 
$position = $playerPosition->add(-0.5, 1.4, -0.8); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 
$position = $playerPosition->add(-0.5, 1.2, 0.8); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 
$position = $playerPosition->add(-0.5, 1.2, -0.8); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 
$position = $playerPosition->add(-0.5, 1.2, 1); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 
$position = $playerPosition->add(-0.5, 1.2, -1); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 
$position = $playerPosition->add(-0.5, 1, 0.6); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 
$position = $playerPosition->add(-0.5, 1, -0.6); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 
$position = $playerPosition->add(-0.5, 1, 0.8); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 
$position = $playerPosition->add(-0.5, 1, -0.8); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 
$position = $playerPosition->add(-0.5, 1, 1); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 
$position = $playerPosition->add(-0.5, 1, -1); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 
$position = $playerPosition->add(-0.5, 1, 1.2); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 
$position = $playerPosition->add(-0.5, 1, -1.2); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 
$position = $playerPosition->add(-0.5, 0.8, 0.6); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 
$position = $playerPosition->add(-0.5, 0.8, -0.6); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 
$position = $playerPosition->add(-0.5, 0.8, 0.8); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 
$position = $playerPosition->add(-0.5, 0.8, -0.8); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 
$position = $playerPosition->add(-0.5, 0.8, 1); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 
$position = $playerPosition->add(-0.5, 0.8, -1); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 
$position = $playerPosition->add(-0.5, 0.8, 1.2); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 
$position = $playerPosition->add(-0.5, 0.8, -1.2); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 
$position = $playerPosition->add(-0.5, 0.6, 0.4); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 
$position = $playerPosition->add(-0.5, 0.6, -0.4); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 
$position = $playerPosition->add(-0.5, 0.6, 0.6); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 
$position = $playerPosition->add(-0.5, 0.6, -0.6); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 
$position = $playerPosition->add(-0.5, 0.6, 0.8); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 
$position = $playerPosition->add(-0.5, 0.6, -0.8); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 
$position = $playerPosition->add(-0.5, 0.6, 1); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 
$position = $playerPosition->add(-0.5, 0.6, -1); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 
$position = $playerPosition->add(-0.5, 0.4, 0.2); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 
$position = $playerPosition->add(-0.5, 0.4, -0.2); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 
$position = $playerPosition->add(-0.5, 0.4, 0.4); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535));
$position = $playerPosition->add(-0.5, 0.4, -0.4); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 
$position = $playerPosition->add(-0.5, 0.4, 0.6); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 
$position = $playerPosition->add(-0.5, 0.4, -0.6); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 
$position = $playerPosition->add(-0.5, 0.4, 0.8); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 
$position = $playerPosition->add(-0.5, 0.4, -0.8); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 
$position = $playerPosition->add(-0.5, 0.2, 0); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 
$position = $playerPosition->add(-0.5, 0.2, -0); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 
$position = $playerPosition->add(-0.5, 0.2, 0.2); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 
$position = $playerPosition->add(-0.5, 0.2, -0.2); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 

$position = $playerPosition->add(-0.5, 0.2, 0.4); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 
$position = $playerPosition->add(-0.5, 0.2, -0.4); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 

$position = $playerPosition->add(-0.5, 0.2, 0.6); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 
$position = $playerPosition->add(-0.5, 0.2, -0.6); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 

$position = $playerPosition->add(-0.5, 0, 0); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 
$position = $playerPosition->add(-0.5, 0, -0); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 

$position = $playerPosition->add(-0.5, 0, 0.2); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 
$position = $playerPosition->add(-0.5, 0, -0.2); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 

$position = $playerPosition->add(-0.5, 0, 0.4); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 
$position = $playerPosition->add(-0.5, 0, -0.4); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 

$position = $playerPosition->add(-0.5, -0.2, 0); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 
$position = $playerPosition->add(-0.5, -0.2, -0); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 

$position = $playerPosition->add(-0.5, -0.2, 0.2); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 
$position = $playerPosition->add(-0.5, -0.2, -0.2); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 

$position = $playerPosition->add(-0.5, -0.4, 0.2); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 
$position = $playerPosition->add(-0.5, -0.4, -0.2); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 

$position = $playerPosition->add(-0.5, -0.4, 0.4); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 
$position = $playerPosition->add(-0.5, -0.4, -0.4); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 

$position = $playerPosition->add(-0.5, -0.6, 0.2); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 
$position = $playerPosition->add(-0.5, -0.6, -0.2); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 

$position = $playerPosition->add(-0.5, -0.6, 0.4); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 
$position = $playerPosition->add(-0.5, -0.6, -0.4); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 

$position = $playerPosition->add(-0.5, -0.6, 0.6); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 
$position = $playerPosition->add(-0.5, -0.6, -0.6); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 

$position = $playerPosition->add(-0.5, -0.8, 0.4); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 
$position = $playerPosition->add(-0.5, -0.8, -0.4); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 

$position = $playerPosition->add(-0.5, -0.8, 0.6); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 
$position = $playerPosition->add(-0.5, -0.8, -0.6); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 

$position = $playerPosition->add(-0.5, -1, 0.6); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 
$position = $playerPosition->add(-0.5, -1, -0.6); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff));
						break 1;
					case 1:
$position = $playerPosition->add(0.8, 1.4, -0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 
$position = $playerPosition->add(-0.8, 1.4, -0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 

$position = $playerPosition->add(0.8, 1.2, -0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 
$position = $playerPosition->add(-0.8, 1.2, -0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 

$position = $playerPosition->add(1, 1.2, -0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 
$position = $playerPosition->add(-1, 1.2, -0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 

$position = $playerPosition->add(0.6, 1, -0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 
$position = $playerPosition->add(-0.6, 1, -0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 

$position = $playerPosition->add(0.8, 1, -0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 
$position = $playerPosition->add(-0.8, 1, -0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 

$position = $playerPosition->add(1, 1, -0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 
$position = $playerPosition->add(-1, 1, -0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 

$position = $playerPosition->add(1.2, 1, -0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 
$position = $playerPosition->add(-1.2, 1, -0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 

$position = $playerPosition->add(0.6, 0.8, -0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 
$position = $playerPosition->add(-0.6, 0.8, -0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 

$position = $playerPosition->add(0.8, 0.8, -0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 
$position = $playerPosition->add(-0.8, 0.8, -0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 

$position = $playerPosition->add(1, 0.8, -0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 
$position = $playerPosition->add(-1, 0.8, -0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 

$position = $playerPosition->add(1.2, 0.8, -0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 
$position = $playerPosition->add(-1.2, 0.8, -0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 

$position = $playerPosition->add(0.4, 0.6, -0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 
$position = $playerPosition->add(-0.4, 0.6, -0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 

$position = $playerPosition->add(0.6, 0.6, -0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 
$position = $playerPosition->add(-0.6, 0.6, -0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 

$position = $playerPosition->add(0.8, 0.6, -0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 
$position = $playerPosition->add(-0.8, 0.6, -0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 

$position = $playerPosition->add(1, 0.6, -0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 
$position = $playerPosition->add(-1, 0.6, -0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 

$position = $playerPosition->add(0.2, 0.4, -0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 
$position = $playerPosition->add(-0.2, 0.4, -0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 

$position = $playerPosition->add(0.4, 0.4, -0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 
$position = $playerPosition->add(-0.4, 0.4, -0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 

$position = $playerPosition->add(0.6, 0.4, -0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 
$position = $playerPosition->add(-0.6, 0.4, -0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 

$position = $playerPosition->add(0.8, 0.4, -0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 
$position = $playerPosition->add(-0.8, 0.4, -0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 

$position = $playerPosition->add(0, 0.2, -0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 
$position = $playerPosition->add(-0, 0.2, -0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 

$position = $playerPosition->add(0.2, 0.2, -0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 
$position = $playerPosition->add(-0.2, 0.2, -0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 

$position = $playerPosition->add(0.4, 0.2, -0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 
$position = $playerPosition->add(-0.4, 0.2, -0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 

$position = $playerPosition->add(0.6, 0.2, -0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 
$position = $playerPosition->add(-0.6, 0.2, -0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 

$position = $playerPosition->add(0, 0, -0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 
$position = $playerPosition->add(-0, 0, -0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 

$position = $playerPosition->add(0.2, 0, -0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 
$position = $playerPosition->add(-0.2, 0, -0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 

$position = $playerPosition->add(0.4, 0, -0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 
$position = $playerPosition->add(-0.4, 0, -0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 

$position = $playerPosition->add(0, -0.2, -0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 
$position = $playerPosition->add(-0, -0.2, -0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 

$position = $playerPosition->add(0.2, -0.2, -0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 
$position = $playerPosition->add(-0.2, -0.2, -0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 

$position = $playerPosition->add(0.2, -0.4, -0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 
$position = $playerPosition->add(-0.2, -0.4, -0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 

$position = $playerPosition->add(0.4, -0.4, -0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 
$position = $playerPosition->add(-0.4, -0.4, -0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 

$position = $playerPosition->add(0.2, -0.6, -0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 
$position = $playerPosition->add(-0.2, -0.6, -0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 

$position = $playerPosition->add(0.4, -0.6, -0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 
$position = $playerPosition->add(-0.4, -0.6, -0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 

$position = $playerPosition->add(0.6, -0.6, -0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 
$position = $playerPosition->add(-0.6, -0.6, -0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 

$position = $playerPosition->add(0.4, -0.8, -0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 
$position = $playerPosition->add(-0.4, -0.8, -0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 

$position = $playerPosition->add(0.6, -0.8, -0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 
$position = $playerPosition->add(-0.6, -0.8, -0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 

$position = $playerPosition->add(0.6, -1, -0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 
$position = $playerPosition->add(-0.6, -1, -0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff));
						break 1;
					case 2:
$position = $playerPosition->add(0.5, 1.4, 0.8); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 
$position = $playerPosition->add(0.5, 1.4, -0.8); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 

$position = $playerPosition->add(0.5, 1.2, 0.8); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 
$position = $playerPosition->add(0.5, 1.2, -0.8); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 

$position = $playerPosition->add(0.5, 1.2, 1); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 
$position = $playerPosition->add(0.5, 1.2, -1); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 

$position = $playerPosition->add(0.5, 1, 0.6); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 
$position = $playerPosition->add(0.5, 1, -0.6); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 

$position = $playerPosition->add(0.5, 1, 0.8); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 
$position = $playerPosition->add(0.5, 1, -0.8); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 

$position = $playerPosition->add(0.5, 1, 1); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 
$position = $playerPosition->add(0.5, 1, -1); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 

$position = $playerPosition->add(0.5, 1, 1.2); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 
$position = $playerPosition->add(0.5, 1, -1.2); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 

$position = $playerPosition->add(0.5, 0.8, 0.6); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 
$position = $playerPosition->add(0.5, 0.8, -0.6); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 

$position = $playerPosition->add(0.5, 0.8, 0.8); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 
$position = $playerPosition->add(0.5, 0.8, -0.8); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 

$position = $playerPosition->add(0.5, 0.8, 1); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 
$position = $playerPosition->add(0.5, 0.8, -1); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 

$position = $playerPosition->add(0.5, 0.8, 1.2); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 
$position = $playerPosition->add(0.5, 0.8, -1.2); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 

$position = $playerPosition->add(0.5, 0.6, 0.4); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 
$position = $playerPosition->add(0.5, 0.6, -0.4); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 

$position = $playerPosition->add(0.5, 0.6, 0.6); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 
$position = $playerPosition->add(0.5, 0.6, -0.6); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 

$position = $playerPosition->add(0.5, 0.6, 0.8); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 
$position = $playerPosition->add(0.5, 0.6, -0.8); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 

$position = $playerPosition->add(0.5, 0.6, 1); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 
$position = $playerPosition->add(0.5, 0.6, -1); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 

$position = $playerPosition->add(0.5, 0.4, 0.2); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 
$position = $playerPosition->add(0.5, 0.4, -0.2); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 

$position = $playerPosition->add(0.5, 0.4, 0.4); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 
$position = $playerPosition->add(0.5, 0.4, -0.4); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 

$position = $playerPosition->add(0.5, 0.4, 0.6); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 
$position = $playerPosition->add(0.5, 0.4, -0.6); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 

$position = $playerPosition->add(0.5, 0.4, 0.8); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 
$position = $playerPosition->add(0.5, 0.4, -0.8); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 

$position = $playerPosition->add(0.5, 0.2, 0); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 
$position = $playerPosition->add(0.5, 0.2, -0); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 

$position = $playerPosition->add(0.5, 0.2, 0.2); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 
$position = $playerPosition->add(0.5, 0.2, -0.2); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 

$position = $playerPosition->add(0.5, 0.2, 0.4); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 
$position = $playerPosition->add(0.5, 0.2, -0.4); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 

$position = $playerPosition->add(0.5, 0.2, 0.6); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 
$position = $playerPosition->add(0.5, 0.2, -0.6); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 

$position = $playerPosition->add(0.5, 0, 0); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 
$position = $playerPosition->add(0.5, 0, -0); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 

$position = $playerPosition->add(0.5, 0, 0.2); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 
$position = $playerPosition->add(0.5, 0, -0.2); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 

$position = $playerPosition->add(0.5, 0, 0.4); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 
$position = $playerPosition->add(0.5, 0, -0.4); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 

$position = $playerPosition->add(0.5, -0.2, 0); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 
$position = $playerPosition->add(0.5, -0.2, -0); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 

$position = $playerPosition->add(0.5, -0.2, 0.2); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 
$position = $playerPosition->add(0.5, -0.2, -0.2); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 

$position = $playerPosition->add(0.5, -0.4, 0.2); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 
$position = $playerPosition->add(0.5, -0.4, -0.2); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 

$position = $playerPosition->add(0.5, -0.4, 0.4); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 
$position = $playerPosition->add(0.5, -0.4, -0.4); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 

$position = $playerPosition->add(0.5, -0.6, 0.2); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 
$position = $playerPosition->add(0.5, -0.6, -0.2); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 

$position = $playerPosition->add(0.5, -0.6, 0.4); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 
$position = $playerPosition->add(0.5, -0.6, -0.4); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 
$position = $playerPosition->add(0.5, -0.6, 0.6); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 
$position = $playerPosition->add(0.5, -0.6, -0.6); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 
$position = $playerPosition->add(0.5, -0.8, 0.4); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 
$position = $playerPosition->add(0.5, -0.8, -0.4); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 
$position = $playerPosition->add(0.5, -0.8, 0.6); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 
$position = $playerPosition->add(0.5, -0.8, -0.6); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 
$position = $playerPosition->add(0.5, -1, 0.6); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 
$position = $playerPosition->add(0.5, -1, -0.6); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 
						break 1;
					case 1:
$position = $playerPosition->add(0.8, 1.4, 0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 
$position = $playerPosition->add(-0.8, 1.4, 0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 
$position = $playerPosition->add(0.8, 1.2, 0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 
$position = $playerPosition->add(-0.8, 1.2, 0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 
$position = $playerPosition->add(1, 1.2, 0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 
$position = $playerPosition->add(-1, 1.2, 0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 
$position = $playerPosition->add(0.6, 1, 0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 
$position = $playerPosition->add(-0.6, 1, 0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 
$position = $playerPosition->add(0.8, 1, 0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 
$position = $playerPosition->add(-0.8, 1, 0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 
$position = $playerPosition->add(1, 1, 0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 
$position = $playerPosition->add(-1, 1, 0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 
$position = $playerPosition->add(1.2, 1, 0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 
$position = $playerPosition->add(-1.2, 1, 0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 
$position = $playerPosition->add(0.6, 0.8, 0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 
$position = $playerPosition->add(-0.6, 0.8, 0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 
$position = $playerPosition->add(0.8, 0.8, 0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 
$position = $playerPosition->add(-0.8, 0.8, 0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 
$position = $playerPosition->add(1, 0.8, 0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 
$position = $playerPosition->add(-1, 0.8, 0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 
$position = $playerPosition->add(1.2, 0.8, 0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 
$position = $playerPosition->add(-1.2, 0.8, 0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 
$position = $playerPosition->add(0.4, 0.6, 0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 
$position = $playerPosition->add(-0.4, 0.6, 0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 
$position = $playerPosition->add(0.6, 0.6, 0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 
$position = $playerPosition->add(-0.6, 0.6, 0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 
$position = $playerPosition->add(0.8, 0.6, 0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 
$position = $playerPosition->add(-0.8, 0.6, 0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 
$position = $playerPosition->add(1, 0.6, 0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 
$position = $playerPosition->add(-1, 0.6, 0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 
$position = $playerPosition->add(0.2, 0.4, 0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 
$position = $playerPosition->add(-0.2, 0.4, 0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 
$position = $playerPosition->add(0.4, 0.4, 0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 
$position = $playerPosition->add(-0.4, 0.4, 0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 
$position = $playerPosition->add(0.6, 0.4, 0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xF53535)); 
$position = $playerPosition->add(-0.6, 0.4, 0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 
$position = $playerPosition->add(0.8, 0.4, 0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 
$position = $playerPosition->add(-0.8, 0.4, 0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 
$position = $playerPosition->add(0, 0.2, 0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 
$position = $playerPosition->add(-0, 0.2, 0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 
$position = $playerPosition->add(0.2, 0.2, 0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 
$position = $playerPosition->add(-0.2, 0.2, 0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 
$position = $playerPosition->add(0.4, 0.2, 0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 
$position = $playerPosition->add(-0.4, 0.2, 0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 
$position = $playerPosition->add(0.6, 0.2, 0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 
$position = $playerPosition->add(-0.6, 0.2, 0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 
$position = $playerPosition->add(0, 0, 0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 
$position = $playerPosition->add(-0, 0, 0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 
$position = $playerPosition->add(0.2, 0, 0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 
$position = $playerPosition->add(-0.2, 0, 0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 
$position = $playerPosition->add(0.4, 0, 0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 
$position = $playerPosition->add(-0.4, 0, 0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 
$position = $playerPosition->add(0, -0.2, 0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 
$position = $playerPosition->add(-0, -0.2, 0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 
$position = $playerPosition->add(0.2, -0.2, 0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 
$position = $playerPosition->add(-0.2, -0.2, 0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 
$position = $playerPosition->add(0.2, -0.4, 0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 
$position = $playerPosition->add(-0.2, -0.4, 0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 
$position = $playerPosition->add(0.4, -0.4, 0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 
$position = $playerPosition->add(-0.4, -0.4, 0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 
$position = $playerPosition->add(0.2, -0.6, 0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 
$position = $playerPosition->add(-0.2, -0.6, 0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 
$position = $playerPosition->add(0.4, -0.6, 0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 
$position = $playerPosition->add(-0.4, -0.6, 0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 
$position = $playerPosition->add(0.6, -0.6, 0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 
$position = $playerPosition->add(-0.6, -0.6, 0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 
$position = $playerPosition->add(0.4, -0.8, 0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 
$position = $playerPosition->add(-0.4, -0.8, 0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 
$position = $playerPosition->add(0.6, -0.8, 0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 
$position = $playerPosition->add(-0.6, -0.8, 0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 
$position = $playerPosition->add(0.6, -1, 0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 
$position = $playerPosition->add(-0.6, -1, 0.5); 
$player->getLevel()->addParticle(new GenericParticle($position, GenericParticle::TYPE_SPARKLER, 0xffffff)); 
					break 1;
				}
			}
		}
	}
}