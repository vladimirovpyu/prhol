<?php
use \AppleService\Interfaces\AppleStateInterface;
use AppleStateAbstract;

/**
 * Class AppleStateLies
 * Состояние яблока - лежит
 *
 * После лежания 5 часов - портится.
 */
class AppleStateLies extends AppleStateAbstract implements AppleStateInterface
{
    /**
     * Упасть
     * @return bool
     */
    public function fall(): bool
    {
        // уже лежит
        throw new Exception("Apple on ground already" );
    }

    /**
     * - съесть ($percent - процент откушенной части)
     * @param int $percent
     * @return int
     */
    public function eat(int $percent): bool
    {
        if ($percent <= $this->apple->size)
        {
            $this->apple->size -= $percent;
        }
        else
        {
            $this->apple->size = 0;
        }

        if ($this->apple->size == 0) {
            $this->service->delete();
        }

        return $this->apple->size;
    }

}