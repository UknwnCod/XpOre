<?php

namespace XpOre\UnknownCod;

use pocketmine\event\block\BlockBreakEvent;
use pocketmine\event\Listener;
use pocketmine\player\Player;
use pocketmine\plugin\PluginBase;

class XpOre extends PluginBase implements Listener
{
    public function onEnable(): void
    {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->saveResource("config.yml");
        $this->getServer()->getCommandMap()->register("", new Commands());

    }

    public function onBreak(BlockBreakEvent $event)
    {
        $player = $event->getPlayer();
        $block = $event->getBlock();
        if($player instanceof Player)
        {
            if($block->getId() == $this->getConfig()->get("block") && $block->getMeta() == $this->getConfig()->get("meta"))
            {
                $event->setXpDropAmount($this->getConfig()->get("xp-amount"));
            }
        }
    }
}