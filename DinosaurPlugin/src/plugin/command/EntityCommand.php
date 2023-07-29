<?php

namespace plugin\command;

use plugin\entity\type\DinosaurEntity;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\utils\InvalidCommandSyntaxException;
use pocketmine\permission\DefaultPermissions;
use pocketmine\player\Player;
use pocketmine\Server;

class EntityCommand extends Command
{
    public function __construct()
    {
        parent::__construct("entity", "Spawns or delete new dinosaur entity", "/entity (spawn/delete)");
        $this->setPermission(DefaultPermissions::ROOT_USER);
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args): void
    {
        assert($sender instanceof Player);

        if(count($args) < 1) throw new InvalidCommandSyntaxException();

        switch($args[0])
        {
            case "spawn":
                $entity = new DinosaurEntity($sender->getLocation());
                $entity->spawnToAll();
                break;
            case "delete":
                foreach(Server::getInstance()->getWorldManager()->getWorlds() as $world){
                    foreach($world->getEntities() as $entity){
                        if($entity instanceof DinosaurEntity){
                            $entity->flagForDespawn();
                        }
                    }
                }
                break;
        }
    }
}