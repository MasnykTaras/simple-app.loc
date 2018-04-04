<?php

namespace app\modules\zcash;

use yii\base\Model;
use app\modules\zcash\ZcashClient;

class CoinForm extends Model
{
    public $wallet;
    public $coin;
    private $username = 'Taras';
    private $password = 'root';
    private $host = '127.0.0.1';
    private $port = '8332';
    private $zaddr = 'zaddres';


    public function rules()
    {
        return [
            [['wallet', 'coin'], 'string', 'max' => 255],
        ];
    }
     /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'wallet' => 'Wallet id',
            'coin' => 'Coin',           
        ];
    }
    /**
     * Connetct by rpc
     * @return ZcashClient
     */
    private function conect()
    {
        return new ZcashClient('http://' . $this->username . ':' . $this->password . '@' .$this->host . ':' . $this->port .'/');
    }
    public function sendMoney()
    {
        $zcash = $this->conect();
	$amounts = array(
            'address' => $this->wallet,
            'amount' => $this->coin,
        );
	return $zcash->z_sendmany($zaddr, $amounts);
       
    }
    public function getInfoWallet()
    {
        $zcash = $this->conect();
        
        return $zcash->getinfo();
        
    }
}