<?php

namespace App;

use Animal\Mammal;


class ZooKeeper
{
    public function __construct()
    {
    }

    public static function feed(Mammal $animal, $food)
    {
        return (new static)->feedAnimal($animal, $food);
    }

    protected function feedAnimal(Mammal $animal, $food)
    {
        return $animal->eat($food);
    }
}
