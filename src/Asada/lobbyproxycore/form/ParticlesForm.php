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
					if(!in_array($name, $particles->particle8)){
						$particles->particle8[] = $name;
						$player->sendMessage("§l§7[§cI§fS§7]§r§aParticles §eActive §6>§b> §l§7[§bWing§7] §l§cIndo§fSkuat§r");
						if(in_array($name, $particles->particle1)){
							unset($particles->particle1[array_search($name, $particles->particle1)]);
						}elseif (in_array($name, $particles->particle3)){
						    unset($particles->particle3[array_search($name, $particles->particle3)]);
						}elseif (in_array($name, $particles->particle4)){
							unset($particles->particle4[array_search($name, $particles->particle4)]);
						}elseif (in_array($name, $particles->particle2)){
							unset($particles->particle2[array_search($name, $particles->particle2)]);
						}elseif (in_array($name, $particles->particle5)){
							unset($particles->particle5[array_search($name, $particles->particle5)]);
						}elseif (in_array($name, $particles->particle6)){
							unset($particles->particle6[array_search($name, $particles->particle6)]);
						}elseif (in_array($name, $particles->particle7)){
							unset($particles->particle7[array_search($name, $particles->particle7)]);
						}
					} else {
						unset($particles->particle8[array_search($name, $particles->particle8)]);
						$player->sendMessage("§l§7[§cI§fS§7]§r§aParticles  §6>§b> §fMenghilangkan Particle: §l§7[§bWing§7] §l§cIndo§fSkuat§r");
					}
				} else {
					$particles->particleForm($player, "\n§cKamu tidak memiliki izin, Particle:\n§l§7[§bWing§7] §l§cIndo§fSkuat§r");
				}
				break;
				
				case 1:
					if(!in_array($name, $particles->particle2)){
						$particles->particle2[] = $name;
						$player->sendMessage("§l§7[§cI§fS§7]§r§aParticles  §6>§b> §fMenghidupkan Particle: §l§7[§bCircle§7]§r §9Splash§r");
						if(in_array($name, $particles->particle1)){
							unset($particles->particle1[array_search($name, $particles->particle1)]);
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
					} else {
						unset($particles->particle2[array_search($name, $particles->particle2)]);
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