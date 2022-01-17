<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Auditor */

$this->title = 'Create Auditor';
$this->params['breadcrumbs'][] = ['label' => 'Auditors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auditor-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
