<?php

namespace Animal;

abstract class Mammal
{
    public function eat($food)
    {
        return static::class . " eats {$food}";
    }
}