<?php
declare(strict_types=1);

namespace rarkhopper\gacha_example;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\player\Player;
use rarkhopper\gacha\Gacha;


class GachaCommand extends Command{
	protected Gacha $gacha;

	public function __construct(){
		parent::__construct('gacha_example');
		$this->setPermission('gacha_example.command.public');
		$this->gacha = $this->createGacha();
	}

	protected function createGacha():Gacha{
	}

	public function execute(CommandSender $sender, string $commandLabel, array $args){
		if(!$this->testPermission($sender)) return;
		if(!$sender instanceof Player) return;

	}
}