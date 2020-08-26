<?php
namespace AppleService\Interfaces;

/**
 * ����� ���������� ���������, ������ ��� ������ ��������� ������ fall � eat
 * �� ��������� �� �� ��������, � ����� ��������� ���������
 *
 * Interface AppleServiceInterface
 * @package AppleService\Interfaces
 */
interface AppleServiceInterface extends AppleStateInterface
{
    /**
     * �������� ��������� ������ (����� �� ������, �����, ������)
     * @return AppleStateInterface
     */
    public function getState(): AppleStateInterface;

    /**
     * Update Apple in DB
     * @return bool
     */
    public function save(): bool;

    /**
     * Delete Apple
     * @return bool
     */
    public function delete(): bool;

}