<?php
namespace app\models\AppleService\Interfaces;

/**
 * Интерфейс сервиса для работы с яблоками.
 * Наследуется от интерфейса Состояние, чтобы реализовать часть функционала через паттерн "Состояние"
 *
 * Interface AppleServiceInterface
 * @package AppleService\Interfaces
 */
interface AppleServiceInterface extends AppleStateInterface
{
    /**
     * Получает состояние (экземпляр одного из классов состояния)
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
