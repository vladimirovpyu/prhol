<?php

namespace app\models;

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
}
