<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Parecer */

$this->title = 'Create Parecer';
$this->params['breadcrumbs'][] = ['label' => 'Parecers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="parecer-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'auditoria' => $auditoria
    ]) ?>

</div>
