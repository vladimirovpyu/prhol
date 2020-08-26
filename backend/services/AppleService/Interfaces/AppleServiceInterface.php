<?php
namespace AppleService\Interfaces;

/**
 * Такая реализация допустима, потому что Сервис реализует методы fall и eat
 * Но реализует их не напрямую, а через различные состояния
 *
 * Interface AppleServiceInterface
 * @package AppleService\Interfaces
 */
interface AppleServiceInterface extends AppleStateInterface
{
    /**
     * Получить состояние яблока (висит на дереве, лежит, сгнило)
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