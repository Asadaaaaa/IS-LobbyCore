<?php

namespace Asada\lobbyproxycore\form;

use pocketmine\Server;
use pocketmine\Player;

use Asada\lobbyproxycore\Main;
use Asada\lobbyproxycore\form\{ClothesForm, ParticlesForm};

use jojoe77777\FormAPI\{SimpleForm, CustomForm};

class LobbyForm {
   
    public function __construct(Main $main){
		$this->main = $main;
	}
	
	public function information($player){
		$form = new SimpleForm(function ($player, int $data = null) {
            $result = $data;
            if ($result === null) {
            return;
            }
			switch($result){
				case 0:
				$this->changeLog($player);
				break;
				
				case 1:
				$this->staffHelperList($player);
				break;
				
				case 2:
				$this->iskuatHistory($player);
				break;
			}
		});
		$form->setTitle("§l§cIndo§fSkuat");
		$form->setContent("§e❐ §7Information About IndoSkuat Server\n\n§7To join other server games hit the slapper (npc/enitity)\n\n§7Please support us by voting §b/vote §7this server to make this server great and more better!\n\n§7You can donate this server to get our ranks!\n\n§7To read Update Log of IndoSkuat, tap the button (§l§8What's New?§r§7)\n\n§7To read Staff and Helper, tap the button (§l§8Staff & Helper§r§7)\n\n§7To read the History of IndoSkuat, tap the button (§l§8History Of IndoSkuat§r§7)");
		$form->addButton("§l§8What's New?§r\n§8Click to Open", 1, "https://i.ibb.co/CtfhjWT/Update-Icon.png");
		$form->addButton("§l§8Staff & Helper§r\n§8Click to Open", 1, "https://i.ibb.co/wpqfS3n/Staff-Icon.png");
		$form->addButton("§l§8History of IndoSkuat§r\n§8Click to Open", 1, "https://i.ibb.co/qW6xWCv/History-Icon.png");
		$form->sendToPlayer($player);
	}
	
	public function changeLog($player){
		$config = $this->main->getConfigs();
		$form = new SimpleForm(function ($player, int $data = null) {
            $result = $data;
            if ($result === null) {
            return;
            }
			switch($result){
				case 0:
				$this->information($player);
				break;
			}
		});
		$form->setTitle("§l§cIndo§fSkuat");
		$form->setContent($config->get("Change-Log"));
		$form->addButton("§l§cBack§r\n§8Click to Open");
		$form->sendToPlayer($player);
	}
	
	public function staffHelperList($player){
		$form = new SimpleForm(function ($player, int $data = null) {
            $result = $data;
            if ($result === null) {
            return;
            }
			switch($result){
				case 0:
				$this->information($player);
				break;
			}
		});
		$form->setTitle("§l§cIndo§fSkuat");
		$form->setContent("§e❐ §l§6Staff List§7:§r\n §7- §fVinoBastian: §cFounder\n §7- §fxAsadax: §cOwner §fand §cDeveloper\n §7- §fMrAshshiddiq: §9Co§7-§9Owner §fand\n    §cDeveloper §fof SkyBlock\n §7- §fIyanKunz: §bStaff §fand §cLead§f-§aBuilder\n §7- §fRahman Ma: §bStaff §fand §aBuilder\n §7- §fItzNino231: §bStaff\n §7- §fPro Herozero07: §bStaff\n §7- §fTheVIVCraft: §bStaff §fand §aBuilder\n §7- §fShadowGamers303: §bStaff §fand §aBuilder\n\n§e❐ §l§6Special Thanks to:§r\n§fAll Builder on this server!\n\n§e❐ §l§6Credits:§r\n  §7- §fRicardoMilos384\n  §7- §fMasApip\n  §7- §fIna5500\n  §7- §fPoggit\n  §7- §fonebone\n  §7- §fjojoe77777\n  §7- §fJackMD\n  §7- §fCzechPMDevs\n  §7- §fjasonwynn10\n  §7- §fDaPigGuy\n  §7- §fBlockHorizons\n  §7- §fGamakCZ\n§fAnd more!.\n\n§o§7Sorry if there are some names we didn't mention, maybe there are mistakes and forget.");
		$form->addButton("§l§cBack§r\n§8Click to Open");
		$form->sendToPlayer($player);
	}

	public function iskuatHistory($player){
		$form = new SimpleForm(function ($player, int $data = null) {
            $result = $data;
            if ($result === null) {
            return;
            }
			switch($result){
				case 0:
				$this->information($player);
				break;
			}
		});
		$form->setTitle("§l§cIndo§fSkuat");
		$form->setContent("          §e❐ §fHistory of §l§cIndo§fSkuat §e❐§r\n\n§fIndoskuat was formed in 2015, the name of the server was inspired by the Indonesian server which was quite famous in that year, namely Indosquad.\n\nAt first the Indoskuat server still used the §bleet.cc §fsoftware, but due to the limited features and development of the server era, it also changed the software, but it actually made the server disband at the end of 2015.\n\nIn may 2018, I'm §dVinobastian §fas the §cFounder §fof this server wants to rebuild and re-establish a server that had succeeded in the year, it took 3 months to re-create this server and finally the server was released at the end of 2018, but everything certainly requires a process , this server is not yet perfect, but with your help and support we will try to make this server better.\n§e#iskuatmenang\n\n §7- VinoBastian");
		$form->addButton("§l§cBack§r\n§8Click to Open");
		$form->sendToPlayer($player);
	}
	
	public function serversList($player){
		$form = new SimpleForm(function ($player, int $data = null) {
            $result = $data;
            if ($result === null) {
            return;
            }
			switch($result){
				case 0:
				$this->main->transfer($player, "Survival");
				break;
				
				case 1:
				$this->main->transfer($player, "SkyBlock");
				break;
				
				case 2:
				$this->main->transfer($player, "Cretive");
				break;
				
				case 3:
				$this->main->transfer($player, "OneBlock");
				break;
				
				case 4:
				$player->teleport($this->main->getServer()->getDefaultLevel()->getSafeSpawn());
				break;
			}
		});
		$form->setTitle("§l§cIndo§fSkuat");
		$form->addButton("§l§8Survival§r\n§8Click to Join", 1, "https://i.ibb.co/v3Ffnxw/Survival.png");
		$form->addButton("§l§8SkyBlock§r\n§8Click to Join", 1, "https://i.ibb.co/YdkLJ7c/SkyBlock.png");
		$form->addButton("§l§8Creative§r\n§8Click to Join", 1, "https://i.ibb.co/GRYMwwr/20210117-162401.png");
		$form->addButton("§l§8OneBlock§r\n§8Click to Join", 1, "https://i.ibb.co/kSmWSTz/OneBlock.png");
		$form->addButton("§l§8Back to Spawn§r\n§8Click to Telelport", 1, "https://i.ibb.co/QQTz5cz/20210117-163808.png");
		$form->sendToPlayer($player);
	}
	
	public function cosmetics($player){
		$form = new SimpleForm(function ($player, int $data = null) {
            $result = $data;
            if ($result === null) {
            return;
            }
			switch($result){
				case 0:
				break;
			}
		});
		$form->setTitle("§l§cIndo§fSkuat");
		$form->setContent("Store");
		$form->addButton("§l§8Close");
		$form->sendToPlayer($player);
	}
	
	public function storeCatalog($player){
		$form = new SimpleForm(function ($player, int $data = null) {
            $result = $data;
            if ($result === null) {
            return;
            }
			switch($result){
				case 0:
				$this->storeSurvivalMembership($player);
				break;
			}
		});
		$form->setTitle("§l§cIndo§fSkuat");
		$form->setContent("§eStore§7:");
		$form->addButton("§l§8Survival Mempership§r\n§8Click to Open", 1, "https://i.ibb.co/CtjV7dr/Survival-Membership.png");
		$form->addButton("§l§8SkyBlock Mempership§r\n§8Click to Open", 1, "https://i.ibb.co/x14fq1X/Sky-Block-Membership.png");
		$form->addButton("§l§8Creative Plot§r\n§8Click to Open", 1, "https://i.ibb.co/tCnmV5R/20210117-132921.png");
		$form->sendToPlayer($player);
	}
	
	public function storeContentUI($player, $content){
		$form = new SimpleForm(function ($player, int $data = null) {
            $result = $data;
            if ($result === null) {
            return;
            }
			switch($result){
				case 0:
				$this->storeCatalog($player);
				break;
			}
		});
		$form->setTitle("§l§cIndo§fSkuat");
		$form->setContent($content);
		$form->addButton("§cBack");
		$form->sendToPlayer($player);
	}
	
	public function storeSurvivalMembership($player){
		$form = new SimpleForm(function ($player, int $data = null) {
            $result = $data;
            if ($result === null) {
            return;
            }
			switch($result){
				case 0:
				$this->storeContentUI($player, "\n§l§eSultan Membership§r\n\n  §7Price:  §a499\n\n  §7Duration: §fLifetime\n\n  §7§n§oWhat do you get?§r\n    §7- §fTes 1\n    §7- §fTes 2\n    §7- §fTes 3\n    §7- §fTes 4\n    §7- §fTes 5\n\n");
				break;
				case 1:
				$this->storeContentUI($player, "\n§l§ePangeran Membership§r\n\n  §7Price:  §a366\n\n  §7Duration: §fLifetime\n\n  §7§n§oWhat do you get?§r\n    §7- §fTes 1\n    §7- §fTes 2\n    §7- §fTes 3\n    §7- §fTes 4\n    §7- §fTes 5\n\n");
				break;
				case 2:
				$this->storeContentUI($player, "\n§l§eRaden Membership§r\n\n  §7Price:  §a240\n\n  §7Duration: §fLifetime\n\n  §7§n§oWhat do you get?§r\n    §7- §fTes 1\n    §7- §fTes 2\n    §7- §fTes 3\n    §7- §fTes 4\n    §7- §fTes 5\n\n");
				break;
				case 3:
				$this->storeContentUI($player, "\n§l§eAdipati Membership§r\n\n  §7Price:  §a130\n\n  §7Duration: §fLifetime\n\n  §7§n§oWhat do you get?§r\n    §7- §fTes 1\n    §7- §fTes 2\n    §7- §fTes 3\n    §7- §fTes 4\n    §7- §fTes 5\n\n");
				break;
				case 4:
				$this->storeContentUI($player, "\n§l§eTumenggung Membership§r\n\n  §7Price:  §a65\n\n  §7Duration: §fLifetime\n\n  §7§n§oWhat do you get?§r\n    §7- §fTes 1\n    §7- §fTes 2\n    §7- §fTes 3\n    §7- §fTes 4\n    §7- §fTes 5\n\n");
				break;
				case 5:
				$this->storeCatalog($player);
				break;
			}
		});
		$form->setTitle("§l§cIndo§fSkuat");
		$form->setContent("§eList§7:");
		$form->addButton("§l§8Sultan§r\n§8Click to Open", 1, "https://i.ibb.co/Rh52SrR/Survival-1-Sultan.png");
		$form->addButton("§l§8Pangeran§r\n§8Click to Open", 1, "https://i.ibb.co/ggGhhmm/Survival-2-Pangeran.png");
		$form->addButton("§l§8Raden§r\n§8Click to Open", 1, "https://i.ibb.co/cNdXWLr/Survival-3-Raden.png");
		$form->addButton("§l§8Adipati§r\n§8Click to Open", 1, "https://i.ibb.co/NKKSD9h/Survival-4-Adipati.png");
		$form->addButton("§l§8Tumenggung§r\n§8Click to Open", 1, "https://i.ibb.co/rbyWhLB/Survival-5-Tumenggung.png");
		$form->addButton("§cBack");
		$form->sendToPlayer($player);
	}
	
	public function playerFeaturesForm($player){
		$form = new SimpleForm(function ($player, int $data = null) {
            $result = $data;
            if ($result === null) {
            return;
            }
			switch($result){
				case 0:
				$clothes = new ClothesForm(Main::getInstance());
				$clothes->clothesMainForm($player);
				break;
				
				case 1:
				$particles = new ParticlesForm(Main::getInstance());
				$particles->mainParticleForm($player);
				break;
			}
		});
		$form->setTitle("§l§cIndo§fSkuat");
		$form->setContent("§eStore§7:");
		$form->addButton("§l§8Clothes§r\n§8Click to Open");
		$form->addButton("§l§8Particles§r\n§8Click to Open");
		$form->sendToPlayer($player);
	}
}