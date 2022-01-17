<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LeiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lei-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'codigo') ?>

    <?= $form->field($model, 'descricao') ?>

    <?= $form->field($model, 'cidade') ?>

    <?= $form->field($model, 'estado') ?>

    <?php // echo $form->field($model, 'pais') ?>

    <?php // echo $form->field($model, 'enquadramento') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
