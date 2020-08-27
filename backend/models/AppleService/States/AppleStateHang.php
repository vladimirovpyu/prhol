<?php
namespace app\models\AppleService\States;

use app\models\AppleService\Interfaces\AppleStateInterface;
use app\models\AppleService\States\AppleStateAbstract;

/**
 * Class AppleStateHang
 * Состояние яблока - висит
 *
 * Пока висит на дереве - испортиться не может.
 * Когда висит на дереве - съесть не получится.
 */
class AppleStateHang extends AppleStateAbstract implements AppleStateInterface
{
    public $stateName = 'hang';

    /**
     * Упасть
     * @return bool
     */
    public function fall(): bool
    {
        // просто меняем состояние
        $this->service->setState(new AppleStateLies($this->service, $this->apple));
    }

    /**
     * - съесть ($percent - процент откушенной части)
     * @param int $percent
     * @return mixed
     */
    public function eat(int $percent): bool
    {
        // Когда висит на дереве - съесть не получится.
        //return false;
        throw new Exception("Cant eat Apple when it Hang" );
    }

    /**
     * - сгнить, в тз этого нет, но такой метод нужен
     * @return bool
     */
    protected function rot(): bool
    {
        // Пока висит на дереве - испортиться не может.
        //return false;
        throw new Exception("Apple cant rot when Hang" );
    }
}
