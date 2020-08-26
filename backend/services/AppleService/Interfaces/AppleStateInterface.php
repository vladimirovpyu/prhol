<?php
namespace AppleService\Interfaces;

/**
 * ��� �������� ������ - ������ � ������
 * ���������� ����� ���������. ������� "���������".
 *
 * Interface AppleStateInterface
 * @package AppleService\Interfaces
 */
interface AppleStateInterface
{

    /**
     * ������
     * @return bool
     */
    public function fall(): bool;

    /**
     * - ������ ($percent - ������� ���������� �����)
     * @param int $percent
     * @return mixed
     */
    public function eat(int $percent): bool;


}