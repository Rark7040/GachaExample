<?php
declare(strict_types=1);

namespace rarkhopper\gacha_example;

use pocketmine\plugin\PluginBase;

class GachaExample extends PluginBase{
	protected function onEnable():void{
		$this->getServer()->getCommandMap()->register($this->getName(), new GachaCommand());
	}
}