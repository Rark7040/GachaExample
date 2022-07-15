<?php
declare(strict_types=1);

namespace rarkhopper\gacha_example;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\item\VanillaItems;
use pocketmine\player\Player;
use rarkhopper\gacha\Gacha;
use rarkhopper\gacha\RandomItemTable;
use rarkhopper\gacha\Rarity;


class GachaCommand extends Command{
	protected Gacha $gacha;

	public function __construct(){
		parent::__construct('gacha_example');
		$this->setPermission('gacha_example.command.public');
		$this->gacha = $this->createGacha();
	}

	protected function createGacha():Gacha{
		return new Gacha(
			'TestGacha',
			'example',
			new RandomItemTable(
				PMGachaItem::create(Rarity::create('N', 60), VanillaItems::COAL()),
				PMGachaItem::create(Rarity::create('R', 20), VanillaItems::IRON_INGOT()),
				PMGachaItem::create(Rarity::create('SR', 8), VanillaItems::GOLD_INGOT()),
				PMGachaItem::create(Rarity::create('SSR', 3), VanillaItems::DIAMOND()),
				PMGachaItem::create(Rarity::create('UR', 0.6), VanillaItems::EMERALD()),
			),
			new ExampleTicket
		);
	}

	public function execute(CommandSender $sender, string $commandLabel, array $args){
		if(!$this->testPermission($sender)) return;
		if(!$sender instanceof Player) return;

	}
}