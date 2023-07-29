<?php
namespace plugin;

use customiesdevs\customies\entity\CustomiesEntityFactory;
use plugin\entity\type\DinosaurEntity;
use plugin\command\EntityCommand;

// use pocketmine\math\Vector3;
use pocketmine\plugin\PluginBase;
// use pocketmine\resourcepacks\ZippedResourcePack;
// use ReflectionProperty;
// use Symfony\Component\Filesystem\Path;
// use function array_merge;
// use function str_replace;

class Main extends PluginBase{

    protected function onEnable() : void{
        $this->getServer()->getCommandMap()->register("", new EntityCommand());

        // $this->getServer()->getPluginManager()->registerEvents(new EventListener($this), $this);


        // $this->saveResource("MCFurniture v1.0.2.mcpack");
        // $rpManager = $this->getServer()->getResourcePackManager();
        // $rpManager->setResourceStack(array_merge($rpManager->getResourceStack(), [new ZippedResourcePack(Path::join($this->getDataFolder(), "MCFurniture v1.0.2.mcpack"))]));
        // (new ReflectionProperty($rpManager, "serverForceResources"))->setValue($rpManager, true);


        CustomiesEntityFactory::getInstance()->registerEntity(DinosaurEntity::class, "alleva:dinosaur"); // identifier should be taken from entity.json of resource pack

    }
}