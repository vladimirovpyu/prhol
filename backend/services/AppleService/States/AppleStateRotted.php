<?php
use \AppleService\Interfaces\AppleStateInterface;

/**
 * Class AppleStateRot
 * Состояние - сгнило
 */
class AppleStateRotted extends AppleStateAbstract implements AppleStateInterface
{
    /**
     * @return bool
     */
    public function fall(): bool
    {
        throw new Exception("Apple on ground already, and rotted" );
    }

    /**
     * @param int $percent
     * @return mixed
     */
    public function eat(int $percent): bool
    {
        throw new Exception("Cant eat rotted Apple" );
    }

}