<?php

declare(strict_types = 1);

namespace JackMD\ScoreHud\Addons;

use JackMD\ScoreHud\Addons\AddonBase;
use KillRate\KillRate;
use pocketmine\player\Player;

class KillRateAddon extends AddonBase{

	/** @var KillRate */
	private $killRate;

	public function onEnable(): void{
		$this->killRate = $this->getApi()->getPluginManager()->getPlugin("KillRate");
	}

	public function getHandlers(): array{
		return [
			"killrate.kille"  => function(Player $player){
				return $this->killRate->getKillManager()->getPlayerKills($player);
			},
			"killrate.deaths" => function(Player $player){
				return $this->killRate->getKillManager()->getPlayerDeaths($player);
			}
		];
	}
}

