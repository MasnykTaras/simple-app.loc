<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'login',
            'password',
            'name',
            'secondname',
            'gender',
            [
                'label' => 'created',
                'value' => date('d-m-Y H:i', strtotime($model->created)),
            ],           
            'email:email',
        ],
    ]) ?>
    <h2> Address</h2>
    <p>
        <?= Html::a('Create Address', ['/address/create',  'id' => $model->id], ['class' => 'btn btn-success']) ?>
    </p>
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
                        return $model::find()->count() > 1;
                    }
                ],                
               
                'urlCreator' => function ($action, $model, $key, $index) {
                    if ($action === 'view') {
                        $url ='/address/view?id='.$model->id;
                        return $url;
                    }

                    if ($action === 'update') {
                        $url ='/address/update?id='.$model->id;
                        return $url;
                    }
                    if ($action === 'delete') {
                        $url ='/address/delete?id='.$model->id;
                        return $url;
                    }

                 },
            ],
        ],
    ]); ?>

</div>
