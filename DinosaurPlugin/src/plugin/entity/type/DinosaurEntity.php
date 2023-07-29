<?php
declare(strict_types=1);

namespace plugin\entity\type;

use pocketmine\entity\Entity;
use pocketmine\entity\EntitySizeInfo;

// https://github.com/CustomiesDevs/Customies/wiki/Custom-Entities
class DinosaurEntity extends Entity {

    protected function getInitialSizeInfo() : EntitySizeInfo {
        return new EntitySizeInfo(0.0, 0.0);
    }

    protected function getInitialDragMultiplier() : float {
        return 0;
    }

    protected function getInitialGravity() : float {
        return 0;
    }

    public static function getNetworkTypeId() : string {
        return "alleva:dinosaur";
    }
}