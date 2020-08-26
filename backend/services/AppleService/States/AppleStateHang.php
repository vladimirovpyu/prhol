<?php
use \AppleService\Interfaces\AppleStateInterface;

/**
 * Class AppleStateHang
 * ��������� ������ - �����
 *
 * ���� ����� �� ������ - ����������� �� �����.
 * ����� ����� �� ������ - ������ �� ���������.
 */
class AppleStateHang extends AppleStateAbstract implements AppleStateInterface
{

    /**
     * ������
     * @return bool
     */
    public function fall(): bool
    {
        // ������ ������ ���������
        $this->service->setState(new AppleStateLies($this->service, $this->apple));
    }

    /**
     * - ������ ($percent - ������� ���������� �����)
     * @param int $percent
     * @return mixed
     */
    public function eat(int $percent): bool
    {
        // ����� ����� �� ������ - ������ �� ���������.
        //return false;
        throw new Exception("Cant eat Apple when it Hang" );
    }

    /**
     * - ������, � �� ����� ���, �� ����� ����� �����
     * @return bool
     */
    protected function rot(): bool
    {
        // ���� ����� �� ������ - ����������� �� �����.
        //return false;
        throw new Exception("Apple cant rot when Hang" );
    }
}

