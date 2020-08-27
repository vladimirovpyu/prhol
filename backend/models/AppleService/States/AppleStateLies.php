<?php
namespace app\models\AppleService\States;

use app\models\AppleService\Interfaces\AppleStateInterface;

/**
 * Class AppleStateLies
 * Состояние яблока - Лежит
 */
class AppleStateLies extends AppleStateAbstract implements AppleStateInterface
{
    public $stateName = 'lies';

    /**
     * Упасть
     * @return bool
     */
    public function fall(): bool
    {
        throw new \Exception("Apple on ground already" );
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

        $this->service->save();

        if ($this->apple->size == 0) {
            $this->service->delete();
        }

        return true;
    }
}
