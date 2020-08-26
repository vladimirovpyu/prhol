<?php

use \AppleService\Interfaces\AppleStateInterface;
use \AppleService\Interfaces\AppleServiceInterface;
use app\models\Apple;

/**
 * Class AppleStateAbstract
 */
abstract class AppleStateAbstract implements AppleStateInterface
{
    /**
     * @var AppleServiceInterface
     */
    protected AppleServiceInterface $service;

    /**
     * @var Apple
     */
    protected Apple $apple;

    /**
     * AppleStateAbstract constructor.
     * @param Apple $apple
     */
    public function __construct(AppleServiceInterface $service, Apple $apple)
    {
        $this->service = $service;
        $this->apple = $apple;
    }

}