<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Lei */

$this->title = 'Create Lei';
$this->params['breadcrumbs'][] = ['label' => 'Leis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lei-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'enquadramento' => $enquadramento,
    ]) ?>

</div>
