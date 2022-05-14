<?php

namespace XpOre\UnknownCod;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\player\Player;

class Commands extends Command
{
    public function __construct()
    {
        parent::__construct("info", "Information about XpOre", "/info", ["ifo"]);
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        if($sender instanceof Player){
            $sender->sendMessage("§bAuthor: §3UnknownCod \n§bName: §3XpOre \n§bVersion: §3v.1.0.0");
        }else
            {
                $sender->sendMessage("Looks like you are not a player");
            }
    }
}