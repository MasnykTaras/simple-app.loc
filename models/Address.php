<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "address".
 *
 * @property int $id
 * @property int $index
 * @property string $state
 * @property string $city
 * @property string $strite
 * @property int $strit_number
 * @property int $office_number
 * @property int $user_id
 *
 * @property User $user
 */
class Address extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'address';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['index', 'state', 'city', 'strite', 'user_id'], 'required'],
            [['index', 'strit_number', 'office_number', 'user_id'], 'integer'],
            [['state', 'city', 'strite'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'index' => 'Index',
            'state' => 'State',
            'city' => 'City',
            'strite' => 'Strite',
            'strit_number' => 'Strit Number',
            'office_number' => 'Office Number',
            'user_id' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
