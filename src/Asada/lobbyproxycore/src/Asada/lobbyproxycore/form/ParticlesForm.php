<?php

namespace Asada\lobbyproxycore\form;

use pocketmine\Server;
use pocketmine\Player;

use Asada\lobbyproxycore\Main;
use Asada\lobbyproxycore\particles\SessionParticle;

use jojoe77777\FormAPI\{SimpleForm, CustomForm};

class ParticlesForm {
   
    public function __construct(Main $main){
		$this->main = $main;
	}
	
	public function mainParticleForm($player){
		$form = new SimpleForm(function ($player, int $data = null) {
            $result = $data;
            if ($result === null) {
            return;
            }
			switch($result){
				case 0:
				$this->listParticleForm($player);
				break;
				
				case 1:
				$name = $player->getName();
				$particles = new SessionParticle(Main::getInstance());
				if(in_array($name, $this->main->particle1)){
					unset($this->main->particle1[array_search($name, $this->main->particle1)]);
				}elseif (in_array($name, $this->main->particle2)){
					unset($this->main->particle2[array_search($name, $this->main->particle2)]);
				}elseif (in_array($name, $this->main->particle3)){
					unset($this->main->particle3[array_search($name, $this->main->particle3)]);
				}elseif (in_array($name, $this->main->particle4)){
					unset($this->main->particle4[array_search($name, $this->main->particle4)]);
				}elseif (in_array($name, $this->main->particle5)){
					unset($this->main->particle5[array_search($name, $this->main->particle5)]);
				}elseif (in_array($name, $this->main->particle6)){
					unset($this->main->particle6[array_search($name, $this->main->particle6)]);
				}elseif (in_array($name, $this->main->particle7)){
					unset($this->main->particle7[array_search($name, $this->main->particle7)]);
				}elseif (in_array($name, $this->main->particle8)){
				unset($this->main->particle8[array_search($name, $this->main->particle8)]);
				}
				break;
			}
		});
		$form->setTitle("§l§cIndo§fSkuat");
		$form->setContent("Choose");
		$form->addButton("Particles List");
		$form->addButton("Reset Particles");
		$form->addButton("Back");
		$form->sendToPlayer($player);
	}
	
	public function listParticleForm($player){
		$form = new SimpleForm(function ($player, int $data = null) {
			$result = $data;
			
			$particles = new SessionParticle(Main::getInstance());
			$name = $player->getName();
			
			switch($result) {
				case 0:
				if($player->hasPermission("particles.wing.iskuat")){
					if(!in_array($name, $this->main->particle8)){
						$this->main->particle8[] = $name;
						$player->sendMessage("§l§7[§cI§fS§7]§r§aParticles §eActive §6>§b> §l§7[§bWing§7] §l§cIndo§fSkuat§r");
						if(in_array($name, $this->main->particle1)){
							unset($this->main->particle1[array_search($name, $this->main->particle1)]);
						}elseif (in_array($name, $this->main->particle3)){
						    unset($this->main->particle3[array_search($name, $this->main->particle3)]);
						}elseif (in_array($name, $this->main->particle4)){
							unset($this->main->particle4[array_search($name, $this->main->particle4)]);
						}elseif (in_array($name, $this->main->particle2)){
							unset($this->main->particle2[array_search($name, $this->main->particle2)]);
						}elseif (in_array($name, $this->main->particle5)){
							unset($this->main->particle5[array_search($name, $this->main->particle5)]);
						}elseif (in_array($name, $this->main->particle6)){
							unset($this->main->particle6[array_search($name, $this->main->particle6)]);
						}elseif (in_array($name, $this->main->particle7)){
							unset($this->main->particle7[array_search($name, $this->main->particle7)]);
						}
					} else {
						unset($this->main->particle8[array_search($name, $this->main->particle8)]);
						$player->sendMessage("§l§7[§cI§fS§7]§r§aParticles  §6>§b> §fMenghilangkan Particle: §l§7[§bWing§7] §l§cIndo§fSkuat§r");
					}
				} else {
					$this->main->particleForm($player, "\n§cKamu tidak memiliki izin, Particle:\n§l§7[§bWing§7] §l§cIndo§fSkuat§r");
				}
				break;
				
				case 1:
					if(!in_array($name, $this->main->particle2)){
						$this->main->particle2[] = $name;
						$player->sendMessage("§l§7[§cI§fS§7]§r§aParticles  §6>§b> §fMenghidupkan Particle: §l§7[§bCircle§7]§r §9Splash§r");
						if(in_array($name, $this->main->particle1)){
							unset($this->main->particle1[array_search($name, $this->main->particle1)]);
						}elseif (in_array($name, $this->main->particle3)){
						    unset($this->main->particle3[array_search($name, $this->main->particle3)]);
						}elseif (in_array($name, $this->main->particle4)){
							unset($this->main->particle4[array_search($name, $this->main->particle4)]);
						}elseif (in_array($name, $this->main->particle5)){
							unset($this->main->particle5[array_search($name, $this->main->particle5)]);
						}elseif (in_array($name, $this->main->particle6)){
							unset($this->main->particle6[array_search($name, $this->main->particle6)]);
						}elseif (in_array($name, $this->main->particle7)){
							unset($this->main->particle7[array_search($name, $this->main->particle7)]);
						}elseif (in_array($name, $this->main->particle8)){
							unset($this->main->particle8[array_search($name, $this->main->particle8)]);
						}
					} else {
						unset($this->main->particle2[array_search($name, $this->main->particle2)]);
						$player->sendMessage("§l§7[§cI§fS§7]§r§aParticles  §6>§b> §fMenghilangkan Particle: §l§7[§bCircle§7]§r §9Splash§r");
					}
				break;
			}
		});
		$form->setTitle("§l§cIndo§fSkuat");
		$form->setContent("Particles List:");
		$form->addButton("Wing Particle");
		$form->addButton("Tes Particle");
		$form->sendToPlayer($player);
	}
}