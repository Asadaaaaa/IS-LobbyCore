<?php

namespace Asada\lobbyproxycore\particles;

use pocketmine\Player;
use pocketmine\scheduler\Task;
use pocketmine\level\Level;
use pocketmine\level\Position;
use pocketmine\level\particle\Particle;
use pocketmine\level\particle\GenericParticle;
use pocketmine\math\Vector3;

use Asada\lobbyproxycore\Main;

class WorldParticles extends Task{
	
	public function __construct(Main $main){
		$this->plugin = $main;
	}
	
	public function onRun(int $currentTick){
		$level = $this->plugin->getServer()->getLevelByName("Lobby");
		#InfoOnRight
		$level->addParticle(new GenericParticle(new Vector3(243.5, 85, 160.5), GenericParticle::TYPE_MOB_SPELL, 0xff0000));
		$level->addParticle(new GenericParticle(new Vector3(243.5, 85, 160.5), GenericParticle::TYPE_MOB_SPELL, 0xffffff));
		#InfoOnLeft
		$level->addParticle(new GenericParticle(new Vector3(223.5, 85, 160.5), GenericParticle::TYPE_MOB_SPELL, 0xff0000));
		$level->addParticle(new GenericParticle(new Vector3(223.5, 85, 160.5), GenericParticle::TYPE_MOB_SPELL, 0xffffff));
		#SurvEco
		$level->addParticle(new GenericParticle(new Vector3(233.5, 87, 129.5), GenericParticle::TYPE_MOB_SPELL, 0xff5454));
		$level->addParticle(new GenericParticle(new Vector3(233.5, 87, 127.5), GenericParticle::TYPE_MOB_SPELL, 0xff5454));
		$level->addParticle(new GenericParticle(new Vector3(234.5, 87, 128.5), GenericParticle::TYPE_MOB_SPELL, 0x54ff54));
		$level->addParticle(new GenericParticle(new Vector3(232.5, 87, 128.5), GenericParticle::TYPE_MOB_SPELL, 0x54ff54));
		#SkyBlock
		$level->addParticle(new GenericParticle(new Vector3(227.5, 87, 130.5), GenericParticle::TYPE_MOB_SPELL, 0x54ffff));
		$level->addParticle(new GenericParticle(new Vector3(227.5, 87, 128.5), GenericParticle::TYPE_MOB_SPELL, 0x54ffff));
		$level->addParticle(new GenericParticle(new Vector3(228.5, 87, 129.5), GenericParticle::TYPE_MOB_SPELL, 0x54ff54));
		$level->addParticle(new GenericParticle(new Vector3(226.5, 87, 129.5), GenericParticle::TYPE_MOB_SPELL, 0x54ff54));
		#OneBlock
		$level->addParticle(new GenericParticle(new Vector3(239.5, 87, 130.5), GenericParticle::TYPE_MOB_SPELL, 0xff54ff));
		$level->addParticle(new GenericParticle(new Vector3(239.5, 87, 128.5), GenericParticle::TYPE_MOB_SPELL, 0xff54ff));
		$level->addParticle(new GenericParticle(new Vector3(240.5, 87, 129.5), GenericParticle::TYPE_MOB_SPELL, 0x54ff54));
		$level->addParticle(new GenericParticle(new Vector3(238.5, 87, 129.5), GenericParticle::TYPE_MOB_SPELL, 0x54ff54));
		#Creative
		$level->addParticle(new GenericParticle(new Vector3(221.5, 87, 130.5), GenericParticle::TYPE_MOB_SPELL, 0xffff54));
		$level->addParticle(new GenericParticle(new Vector3(221.5, 87, 132.5), GenericParticle::TYPE_MOB_SPELL, 0xffff54));
		$level->addParticle(new GenericParticle(new Vector3(220.5, 87, 131.5), GenericParticle::TYPE_MOB_SPELL, 0xffff54));
		$level->addParticle(new GenericParticle(new Vector3(222.5, 87, 131.5), GenericParticle::TYPE_MOB_SPELL, 0xffff54));
	}
}