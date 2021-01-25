<?php

namespace Asada\lobbyproxycore\inventory;

use pocketmine\{Player, Server};
use pocketmine\scheduler\Task;
use pocketmine\event\Listener;
use pocketmine\item\Item;
use pocketmine\item\ItemIds;

use Asada\lobbyproxycore\Main;

class PlayerInventory implements Listener {
	
	public function __construct(Main $main) {
		$this->main = $main;
	}
	
	public function getItems($player) {
		$inv = $player->getInventory();
		$inv->clearAll();
		
		$item1 = Item::get(340, 0, 1);
		$item1->setCustomName("§r§6Info of §cIndo§fSkuat\n§7Tap to Open");
		$item1->getNamedTag()->setString("custom_data", "item_info");
		
		$item2 = Item::get(345, 0, 1);
		$item2->setCustomName("§r§6Servers\n§7Tap to Open");
		$item2->getNamedTag()->setString("custom_data", "item_servers");
		
		$item3 = Item::get(397, 3, 1);
		$item3->setCustomName("§r§6Player Features\n§7Tap to Open");
		$item3->getNamedTag()->setString("custom_data", "item_player_features");
		
		$inv->setItem(0, $item1);
		$inv->setItem(4, $item2);
		$inv->setItem(8, $item3);
	}
	
	public function getPlayerFeatures($player) {
		$inv = $player->getInventory();
		$inv->clearAll();
		
		$item1 = Item::get(369, 0, 1);
		$item1->setCustomName("§r§bSnow Gun\n§7Tap to Shoot");
		$item1->getNamedTag()->setString("custom_data", "item_snow_gun");
		
		$item2 = Item::get(377, 0, 1);
		$item2->setCustomName("§r§eCosmetics Menu\n§7Tap to Open");
		$item2->getNamedTag()->setString("custom_data", "item_cosmetics_menu");
		
		$item3 = Item::get(351, 8, 1);
		$item3->setCustomName("§r§cHide Players\n§7Tap to Open");
		$item3->getNamedTag()->setString("custom_data", "item_hide_player");
		
		$item3 = Item::get(351, 5, 1);
		$item3->setCustomName("§r§dShow Players\n§7Tap to Open");
		$item3->getNamedTag()->setString("custom_data", "item_show_player");
		
		$item4 = Item::get(159, 14, 1);
		$item4->setCustomName("§r§6Main Menu\n§7Tap to Back");
		$item4->getNamedTag()->setString("custom_data", "item_main_menu");
		
		$inv->setItem(0, $item1);
		$inv->setItem(1, $item2);
		$inv->setItem(4, $item3);
		$inv->setItem(8, $item4);
	}
}