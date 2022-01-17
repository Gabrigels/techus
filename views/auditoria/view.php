<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Auditoria */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Auditorias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="auditoria-view">

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
            [
                'attribute' => 'id',
                'value' => $model->id,
             ],
             [
                'attribute' => 'descricao',
                'value' => $model->descricao,
             ],
             [
                'attribute' => 'id_auditor',
                'value' => $model->relAuditor->nome,
             ],
             [
                'attribute' => 'id_empresa',
                'value' => $model->relEmpresa->nome,
             ],
             [
                'attribute' => 'id_lei',
                'value' => $model->relLei->codigo,
             ],
        ],
    ]) ?>

</div>
