<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\models\Auditoria */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="auditoria-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'descricao')->textInput() ?>

    <?= $form->field($model, 'id_auditor')->dropDownList($auditor) ?>

    <?= $form->field($model, 'id_empresa')->dropDownList($empresa) ?>

    <?= $form->field($model, 'id_lei')->dropDownList($lei) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
