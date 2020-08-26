<?php
use \AppleService\Interfaces\AppleStateInterface;
use AppleStateAbstract;

/**
 * Class AppleStateLies
 * ��������� ������ - �����
 *
 * ����� ������� 5 ����� - ��������.
 */
class AppleStateLies extends AppleStateAbstract implements AppleStateInterface
{
    /**
     * ������
     * @return bool
     */
    public function fall(): bool
    {
        // ��� �����
        throw new Exception("Apple on ground already" );
    }

    /**
     * - ������ ($percent - ������� ���������� �����)
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