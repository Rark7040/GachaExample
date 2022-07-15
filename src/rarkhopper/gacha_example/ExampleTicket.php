<?php
declare(strict_types=1);

namespace rarkhopper\gacha_example;

use pocketmine\item\VanillaItems;
use pocketmine\player\Player;
use rarkhopper\gacha\ITicket;

class ExampleTicket implements ITicket{
	public function has(Player $player, int $count):bool{
		return $player->getInventory()->contains(VanillaItems::GOLD_NUGGET()->setCount($count));
	}

	public function consume(Player $player, int $count):void{
		$player->getInventory()->removeItem(VanillaItems::GOLD_NUGGET()->setCount($count));
	}
}