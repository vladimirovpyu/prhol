<?php
use \AppleService\Interfaces\AppleStateInterface;

/**
 * Class AppleStateRot
 * Состояние яблока - сгнило
 *
 * Когда испорчено - съесть не получится.
 */
class AppleStateRotted extends AppleStateAbstract implements AppleStateInterface
{
    /**
     * Упасть
     * @return bool
     */
    public function fall(): bool
    {
        // уже лежит
        throw new Exception("Apple on ground already, and rotted" );
    }

    /**
     * - съесть ($percent - процент откушенной части)
     * @param int $percent
     * @return mixed
     */
    public function eat(int $percent): bool
    {
        throw new Exception("Cant eat rotted Apple" );
    }

}