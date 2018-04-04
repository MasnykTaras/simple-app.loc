<?php

namespace app\modules\zcash\controllers;

use Yii;
use yii\web\Controller;
use app\modules\zcash\CoinForm;


/**
 * Default controller for the `zcash` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $model = new CoinForm();
        if($model->load(Yii::$app->request->post())){    
            
           
            var_dump($model->sendMoney());
            die;
        }       
        return $this->render('index', [
            'model' => $model,
        ]);
        
    }
    public function actionGetInfo()
    {
        
        $model = new CoinForm();
        return $this->render('index', [
            'model' => $model,
            'walletInfo' => $model->getInfoWallet(),
        ]);        
    }
}
