<?php

namespace app\models;

use yii\base\Model;

class AddAppleForm extends Model
{
    public $color;

    public function rules()
    {
        return [
            [['color'], 'required'],
        ];
    }
}