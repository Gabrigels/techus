<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Parecer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="parecer-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_auditoria')->textInput() ?>

    <?= $form->field($model, 'descricao')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
