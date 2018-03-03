<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

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
    /*
     * Gender constant
     */
    const MEN = 1;
    const WOMEN = 2;
    const UNDEFINED = 0;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['login', 'password', 'name', 'secondname', 'gender', 'created', 'email'], 'required'],
            [['gender'], 'integer'],           
            [['name', 'secondname', 'email'], 'string', 'max' => 255],
            [['name', 'secondname'], 'filter', 'filter'=>'ucfirst'],
            [['created'], 'safe'],
            [['login'], 'string', 'min' => 4],
            [['password'], 'string', 'min' => 6],
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
    public static function getGender()
    {
        $gender = [
            ['value' => self::MEN, 'title' => 'Men'],
            ['value' => self::WOMEN, 'title' => 'Women'],
            ['value' => self::UNDEFINED, 'title' => 'Undefined'],
        ];
        return ArrayHelper::map($gender, 'value', 'title');
    }
}
