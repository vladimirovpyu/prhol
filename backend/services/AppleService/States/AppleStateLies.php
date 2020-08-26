<?php
use \AppleService\Interfaces\AppleStateInterface;

/**
 * Class AppleStateLies
 * Состояние яблока - Лежит
 */
class AppleStateLies extends AppleStateAbstract implements AppleStateInterface
{
    /**
     * Упасть
     * @return bool
     */
    public function fall(): bool
    {
        throw new Exception("Apple on ground already" );
    }

    /**
     * - скушать
     * @param int $percent
     * @return bool
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