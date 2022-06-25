<?php

namespace Core\Entity\Traits;

use Exception;

trait MagicMethodsTrait {
    public function __get($property)
    {
        if($this->{$property}) {
            return $this->{$property};
        }

        $className = get_class($this);

        throw new Exception("Property {$property} not found in class {get_class($className)}");
    }
}