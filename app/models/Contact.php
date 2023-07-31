<?php

namespace app\models;

use floor12\phone\PhoneValidator;
use yii\db\ActiveRecord;

/**
 * @property int $id
 * @property string $name
 * @property int $phone
 */
class Contact extends ActiveRecord
{
    public function rules(): array
    {
        return [
            ['id', 'integer'],
            [['name', 'phone'], 'required'],
            ['phone', PhoneValidator::class],
        ];
    }
}
