<?php
namespace AppleService;

use app\models\Apple;
use AppleService\Interfaces\AppleServiceInterface;
use AppleService\Interfaces\AppleStateInterface;

/**
 * Class AppleService
 * ��������� ������ ������ � ��������
 */
class AppleService implements AppleServiceInterface
{
    const APPLE_STATUS_HANG = 0;
    const APPLE_STATUS_FALL = 1;

    /**
     * ActiveRecord � �������
     * @var Apple
     */
    private Apple $apple;

    /**
     * ���������
     */
    private AppleStateInterface $state;

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
            return false;
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
            return false;
        }
        return true;
    }

    /**
     * ���������� ��������� �� ������ ������
     * @return AppleStateInterface
     */
    private function checkState()
    {
        // 1. �����
        if ($this->apple->status == self::APPLE_STATUS_HANG) {
            $this->setState(new \AppleStateHang($this, $this->apple));
        }
        // 2. �����
        else
        {
            // 2.1 ������
            $nowDateTime = new \DateTime();
            $fallDateTime = new \DateTime($this->apple->date_fall);
            if ($nowDateTime->diff($fallDateTime)->format('%H') > 5) {
                $this->setState(new \AppleStateRotted($this, $this->apple));
            }
            // 2.2 �� ������
            else {
                $this->setState(new \AppleStateLies($this, $this->apple));
            }
        }

    }

    /**
     * ��� ��������� ���������
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
            return false;
        }
        return true;
    }

}