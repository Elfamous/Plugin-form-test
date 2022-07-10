<?php

namespace zeyroz\tuto;

use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase implements Listener{

    public function onEnable(): void
    {
        $this->getServer()->getCommandMap()->registerAll('Commands', [
            new Commands\Bonjour("bonjour","Dire bonjour","/bonjour", [])
        ]);
    }
}