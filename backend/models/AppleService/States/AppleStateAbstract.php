<?php
namespace app\models\AppleService\States;

use app\models\AppleService\Interfaces\AppleStateInterface;
use app\models\AppleService\Interfaces\AppleServiceInterface;
use app\models\Apple;

/**
 * Class AppleStateAbstract
 */
abstract class AppleStateAbstract implements AppleStateInterface
{
    public $stateName = 'undefined';

    /**
     * @var AppleServiceInterface
     */
    protected $service;

    /**
     * @var Apple
     */
    protected $apple;

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
