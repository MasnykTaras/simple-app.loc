<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $login
 * @property string $password
 * @property string $name
 * @property string $secondname
 * @property int $gender
 * @property string $created
 * @property string $email
 *
 * @property Address[] $addresses
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['login', 'password', 'name', 'secondname', 'gender', 'created', 'email'], 'required'],
            [['gender'], 'integer'],
            [['created'], 'safe'],
            [['login', 'password', 'name', 'secondname', 'email'], 'string', 'max' => 255],
            [['login'], 'unique'],
            [['email'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'login' => 'Login',
            'password' => 'Password',
            'name' => 'Name',
            'secondname' => 'Secondname',
            'gender' => 'Gender',
            'created' => 'Created',
            'email' => 'Email',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAddresses()
    {
        return $this->hasMany(Address::className(), ['user_id' => 'id']);
    }
}
