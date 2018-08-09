<?php
use kartik\grid\GridView;
use yii\data\ArrayDataProvider;

$dataProvider = new ArrayDataProvider([
    'allModels' => $model->mesaInvitados,
    'key' => 'id'
]);
$gridColumns = [
    ['class' => 'yii\grid\SerialColumn',
        'headerOptions' => ['style' => 'width: 10%'],
    ],
    ['attribute' => 'id', 'visible' => false],
    [
        'attribute' => 'invitado.nombre',
        'label' => 'Nombre',
        'headerOptions' => ['style' => 'width: 40%'],
    ],
    [
        'attribute' => 'invitado.comfirmacion',
        'label' => 'Confirmacion',
        'headerOptions' => ['style' => 'width: 40%'],
        'value' => function ($model, $key, $index, $column)
        {
            if ($model->invitado->confirmacion == '0') return 'Sin confirmar';
            if ($model->invitado->confirmacion == '1') return 'Confirmado';
            if ($model->invitado->confirmacion == '2') return 'No asistira';
        },
    ],
    [
        'class' => 'yii\grid\ActionColumn',
        'controller' => 'mesa-invitado'
    ],
];

echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => $gridColumns,
    'containerOptions' => ['style' => 'overflow: auto'],
    'pjax' => true,
    'beforeHeader' => [
        [
            'options' => ['class' => 'skip-export']
        ]
    ],
    'export' => [
        'fontAwesome' => true
    ],
    'bordered' => true,
    'striped' => true,
    'condensed' => true,
    'responsive' => true,
    'hover' => true,
    'showPageSummary' => false,
    'persistResize' => false,
]);
