<?php

namespace Online\scheduler;

use Online\Utils\Utils;

use pocketmine\plugin\Plugin;
use pocketmine\scheduler\PluginTask;

class SchedulerTask extends PluginTask
{
    public function __construct(Plugin $plugin)
    {
        parent::__construct($plugin);
    }

    public function onRun($currentTick)
    {
        foreach($this->getOwner()->getServer()->getOnlinePlayers() as $sender){
            $online = Utils::getOnline('127.0.0.1', 19132);
            $right = str_repeat(" ", 45);
            $sender->sendTip(" $right 24serv\n$right online:" . $online);
        }
    }
}