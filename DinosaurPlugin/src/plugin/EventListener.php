<?php
namespace plugin;

use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\event\entity\EntitySpawnEvent;
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\event\Listener;
use pocketmine\network\mcpe\protocol\AnimateEntityPacket;
use pocketmine\Server;
use plugin\entity\type\DinosaurEntity;
use pocketmine\utils\TextFormat;
use pocketmine\network\mcpe\NetworkBroadcastUtils;

class EventListener implements Listener {
    public Main $plugin;

    public function __construct(Main $plugin) {
        $this->plugin = $plugin;
    }

    // https://apidoc.pmmp.io/df/d6f/classpocketmine_1_1event_1_1entity_1_1_entity_spawn_event.html
    public function onEntitySpawn(EntitySpawnEvent $event): void {
        $entity = $event->getEntity();
        if($entity instanceof DinosaurEntity) {
            $this->plugin->getLogger()->info(TextFormat::DARK_GREEN . "onEntitySpawn DinosaurEntity");
            // https://apidoc.pmmp.io/dc/da7/classpocketmine_1_1network_1_1mcpe_1_1protocol_1_1_animate_entity_packet.html
            $animation = AnimateEntityPacket::create("animation.dinosaur.move","","",0,"controller.animation.dinosaur.move",0,[$entity->getId()]);
            NetworkBroadcastUtils::broadcastPackets($entity->getWorld()->getPlayers(), [$animation]);
        }
    }

}