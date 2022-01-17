<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LeiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Leis';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lei-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Lei', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'codigo',
            'descricao:ntext',
            'cidade',
            'estado',
            'pais',
            'enquadramento',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
