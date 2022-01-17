<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Auditor */

$this->title = 'Update Auditor: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Auditors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="auditor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
