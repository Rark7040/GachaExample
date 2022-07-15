<?php
declare(strict_types=1);

namespace rarkhopper\gacha_example;

use pocketmine\item\Item;
use pocketmine\player\Player;
use rarkhopper\gacha\IGachaItem;
use rarkhopper\gacha\IRarity;
use rarkhopper\gacha\Rarity;

class PMGachaItem implements IGachaItem{
	protected Rarity $rarity;
	protected Item $item;

	public static function create(Rarity $rarity, Item $item):static{
		$instance = new static;
		$instance->rarity = $rarity;
		$instance->item = $item;
		return $instance;
	}

	public function getRarity():IRarity{
		return $this->rarity;
	}

	public function giveItem(Player $player):void{
		$player->sendMessage('['.$this->getRarity()->getName().'] '.$this->item->getName());
		$player->getInventory()->addItem(clone $this->item);
	}
}