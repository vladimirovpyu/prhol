<?php
namespace AppleService\Interfaces;

/**
 * Два основных метода - падать и кушать
 * Реализация через состояния. Паттерн "Состояние".
 *
 * Interface AppleStateInterface
 * @package AppleService\Interfaces
 */
interface AppleStateInterface
{

    /**
     * Упасть
     * @return bool
     */
    public function fall(): bool;

    /**
     * - съесть ($percent - процент откушенной части)
     * @param int $percent
     * @return mixed
     */
    public function eat(int $percent): bool;


}