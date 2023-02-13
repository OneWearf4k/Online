<?php

namespace Online;

use Online\scheduler\SchedulerTask;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\Server;

use Online\scheduler\SchedulerTaskTask;

class Main extends PluginBase implements Listener{

    public static $instance;

    function onEnable()
    {
        self::$instance = $this;
        Server::getInstance()->getScheduler()->scheduleDelayedTask(new SchedulerTask(self::$instance), 1);
        $this->info();
    }

    function info(){
        Server::getInstance()->getLogger()->notice('
    
    Plugin by talk.24serv.pro
    author: WHOIM
    ');
    }

    /**
     * @param getInstance
     **/

    public static function getInstance(){
        return self::$instance;
    }
}