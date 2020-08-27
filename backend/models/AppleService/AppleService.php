<?php
namespace app\models\AppleService;

use app\models\Apple;
use app\models\AppleService\Interfaces\AppleServiceInterface;
use app\models\AppleService\Interfaces\AppleStateInterface;
use app\models\AppleService\States\AppleStateHang;

/**
 * Class AppleService
 * Реализует логику работы с яблоками
 */
class AppleService implements AppleServiceInterface
{
    const APPLE_STATUS_HANG = 0;
    const APPLE_STATUS_FALL = 1;

    /**
     * @var Apple
     */
    private $apple;

    /**
     * @var AppleStateInterface
     */
    private $state;

    public function __construct(Apple $apple)
    {
        $this->apple = $apple;
        $this->checkState();
    }

    /**
     * @param int $percent
     * @return int
     */
    public function eat(int $percent): bool
    {
        try {
            $this->state->eat($percent);
        } catch (\Exception $e) {
            throw $e;
        }
        return true;
    }

    /**
     * @return bool
     */
    public function fall(): bool
    {
        try {
            $this->state->fall();
        }
        catch (\Exception $e) {
            throw $e;
        }
        return true;
    }

    /**
     * Определяет состояние по данным яблока
     * @return AppleStateInterface
     */
    private function checkState()
    {
        // 1. висит
        if ($this->apple->status == self::APPLE_STATUS_HANG) {
            $this->setState(new AppleStateHang($this, $this->apple));
        }
        // 2. лежит
        else
        {
            // 2.1 испорчено
            // После лежания 5 часов - портится.
            $nowDateTime = new \DateTime();
            $fallDateTime = new \DateTime($this->apple->date_fall);
            if ($nowDateTime->diff($fallDateTime)->format('%H') > 5) {
                $this->setState(new AppleStateRotted($this, $this->apple));
            }
            // 2.2 еще съедобно
            else {
                $this->setState(new AppleStateLies($this, $this->apple));
            }
        }

    }

    /**
     * Для изменения состояний
     * @param AppleStateInterface $state
     * @return AppleStateInterface
     */
    public function setState(AppleStateInterface $state): AppleStateInterface
    {
        return $this->state = $state;
    }

    public function getState(): AppleStateInterface
    {
        return $this->state;
    }

    public function getSize(): int
    {
        return $this->apple->size;
    }

    public function save(): bool
    {
        $this->apple->save();
    }

    public function delete(): bool
    {
        try {
            $this->apple->delete();
        }
        catch(\Exception $e) {
            throw $e;
        }
        return true;
    }

}
