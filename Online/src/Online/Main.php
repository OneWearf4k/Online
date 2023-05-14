<?php

declare(strict_types=1);

namespace Online;

use Online\scheduler\SchedulerTask;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\Server;

use Online\scheduler\SchedulerTaskTask;

class Main extends PluginBase{

    /** @var getInstance */
    private static $instance;

    public function onEnable() : Void
    {
        self::$instance = $this;
        Server::getInstance()->getScheduler()->scheduleRepeatingTask(new SchedulerTask(self::$instance), 20);
        $this->info();
    }

    public function info(){
        Server::getInstance()->getLogger()->notice('
    
    Plugin by talk.24serv.pro
    author: WHOIM
    ');
    }

    /**
     * @return getInstance
     **/

    public static function getInstance() : Main{
        return self::$instance;
    }
}
