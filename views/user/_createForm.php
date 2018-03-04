<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\User;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($modelUser, 'login')->textInput(['maxlength' => true]) ?>

    <?= $form->field($modelUser, 'password')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($modelUser, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($modelUser, 'secondname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($modelUser, 'gender')->dropDownList(User::getGender()) ?>

    <?= $form->field($modelUser, 'email')->textInput(['maxlength' => true]) ?>
    
    <h2>Address</h2>
    
    <?= $form->field($modelAddress, 'post_index')->textInput() ?>

     <?= $form->field($modelAddress, 'state')->dropDownList($modelAddress->createCodeArrey()) ?>

    <?= $form->field($modelAddress, 'city')->textInput(['maxlength' => true]) ?>

    <?= $form->field($modelAddress, 'street')->textInput(['maxlength' => true]) ?>

    <?= $form->field($modelAddress, 'street_number')->textInput() ?>

    <?= $form->field($modelAddress, 'office_number')->textInput() ?>
    
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
