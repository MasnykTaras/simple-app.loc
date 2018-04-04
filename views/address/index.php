<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchAddress */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Addresses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="address-index">

    <h1><?= Html::encode($this->title) ?></h1>
    
    <?= GridView::widget([
        
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'post_index',
            'state',
            'city',
            'street',
            [
                'class' => 'yii\grid\ActionColumn',
                'visibleButtons' =>[
                    'delete' => function($model){
                        return false;
                    }
                ], 
                
            ],
        ],
    ]);
    ?>
</div>
