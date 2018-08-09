<?php

/* @var $this yii\web\View */
/* @var $searchModel app\models\MesaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\helpers\Html;
use kartik\export\ExportMenu;
use kartik\grid\GridView;

$this->title = 'Invitados sin mesa';
?>
<br>
<br>
<br>
<div class="mesa-index">

    <h1><?= $titulo; ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Listado Mesas', ['mesa/index'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Crear Mesa', ['create'], ['class' => 'btn btn-info']) ?>
        <?= Html::a('Invitados con Mesa', ['invitado_mesa', 'tipo' => 1], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Invitados sin Mesa', ['invitado_mesa', 'tipo' => 0], ['class' => 'btn btn-warning']) ?>
    </p>

    <?php
    $gridColumn = [
        [
            'class' => 'yii\grid\SerialColumn',
            'contentOptions' => ['style' => 'width: 20px;'],
        ],
        ['attribute' => 'id', 'visible' => false],
        [
            'attribute' => 'nombre',
            'width' => '20%',
        ],
        [
            'attribute' => 'confirmacion',
            'width' => '20%',
            'value' => function ($model){
                return $model->getConfirmacion();
            }
        ],
        [
            'attribute' => 'mesaInvitado.mesa.nombre',
            'width' => '20%',
        ],
        [
            'attribute' => 'mesaInvitado.mesa.numero',
            'width' => '20%',
        ],

        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{view} {update} {delete}',
        ],

    ];
    ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumn,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-mesa']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span>  ' . Html::encode($this->title),
        ],
        'export' => false,
        // your toolbar can include the additional full export menu
    ]); ?>

</div>
