<?php

namespace betterpots;

use pocketmine\plugin\PluginBase;

use pocketmine\player\Player;
use pocketmine\Server;
use pocketmine\entity\projectile\SplashPotion;
use pocketmine\event\Listener;
use pocketmine\event\entity\ProjectileHitBlockEvent;

class Main extends PluginBase implements Listener {
	
    public function onEnable(): void {
     $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }
  
    public function onInteract(ProjectileHitBlockEvent $event) {
        $pot = $event->getEntity();
        $player = $pot->getOwningEntity();
        if(!$player instanceof Player) {
            return;
        }
        $distance = $pot->distance($player); 
        if($distance <= 3.4) {
            if($pot instanceof SplashPotion && $player->isAlive()) {
                $player->setHealth($player->getHealth() + 4.9);
            }
        }
    }
}
