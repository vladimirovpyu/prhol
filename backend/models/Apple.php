<?php

namespace app\models;

use app\models\AppleService\AppleService;
use Yii;

/**
 * This is the model class for table "apple".
 *
 * @property int $id
 * @property string|null $color
 * @property string|null $date_created
 * @property string|null $date_fall
 * @property int|null $status
 * @property int|null $size
 */
class Apple extends \yii\db\ActiveRecord
{
    /**
     * @var AppleService
     */
    private $service;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'apple';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date_created', 'date_fall'], 'safe'],
            [['status', 'size'], 'integer'],
            [['color'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'color' => 'Color',
            'date_created' => 'Date Created',
            'date_fall' => 'Date Fall',
            'status' => 'Status',
            'size' => 'Size',
        ];
    }

    /**
     * Inject Apple Service into Model by constructor
     * Apple constructor.
     * @param array $config
     */
    public function __construct($config = [])
    {
        parent::__construct($config);
        $this->service = new AppleService($this);
    }

    /**
     * Abstract attribute $apple->state
     * @return mixed
     */
    public function getState()
    {
        return $this->service->getState()->stateName;
    }

    public function fall()
    {
        return $this->service->fall();
    }

    public function eat(int $size)
    {
        return $this->service->eat($size);
    }
}
