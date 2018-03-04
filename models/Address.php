<?php

namespace app\models;

use Yii;
use  app\models\User;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "address".
 *
 * @property int $id
 * @property stirng $post_index
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
            [['post_index', 'state', 'city', 'strite', 'strit_number', 'user_id'], 'required'],
            [[ 'strit_number', 'office_number', 'user_id'], 'integer'],
            [['post_index', 'state', 'city', 'strite'], 'string', 'max' => 255],
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
            'post_index' => 'Post index',
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
        return ArrayHelper::map(User::find('login', 'id')->all(), 'id', 'login');
    }
     /**
     * Get list of country
     * @return array
     */
    protected  function getCountryCode()
    {
        $content = file_get_contents('https://restcountries.eu/rest/v2/all');

       return json_decode($content);
         
    }
    
    public  function createCodeArrey()
    {
        return ArrayHelper::map($this->getCountryCode(), 'alpha2Code', 'name');
    }
}
