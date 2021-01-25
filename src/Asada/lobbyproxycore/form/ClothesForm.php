<?php

namespace Asada\lobbyproxycore\form;

use pocketmine\Server;
use pocketmine\Player;

use Asada\lobbyproxycore\Main;
use Asada\lobbyproxycore\skin\ResetSkin;
use Asada\lobbyproxycore\skin\SetSkin;

use jojoe77777\FormAPI\{SimpleForm, CustomForm};

class ClothesForm {
   
    public function __construct(Main $main){
		$this->main = $main;
	}
	
	public function clothesMainForm($player){
		$form = new SimpleForm(function ($player, int $data = null) {
            $result = $data;
            if ($result === null) {
            return;
            }
			switch($result){
				case 0:
				$this->clothesChooseForm($player);
				break;
				
				case 1:
				$resetSkin = new ResetSkin(Main::getInstance());
				$resetSkin->setSkin($player);
				break;
			}
		});
		$form->setTitle("§l§cIndo§fSkuat");
		$form->setContent("Clothes Menu:");
		$form->addButton("Choose Clothes");
		$form->addButton("Reset Clothes");
		$form->sendToPlayer($player);
	}
	
	public function clothesChooseForm($player)
	{
		$form = new SimpleForm(function ($player, int $data = null) {
            $result = $data;
            if ($result === null) {
            return;
            }
			switch($result){
				case 0:
				$setSkin = new SetSkin(Main::getInstance());
				$setSkin->setSkin($player, "pikachu");
				break;
				
				case 1:
				$this->clothesMainForm($player);
				break;
			}
		});
		$form->setTitle("§l§cIndo§fSkuat");
		$form->setContent("Clothes Menu:");
		$form->addButton("Pikachu");
		$form->addButton("Back");
		$form->sendToPlayer($player);
	}
}