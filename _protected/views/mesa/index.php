<?php

/* @var $this yii\web\View */
/* @var $searchModel app\models\MesaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\helpers\Html;
use kartik\export\ExportMenu;
use kartik\grid\GridView;

$this->title = 'Mesa';
$this->params['breadcrumbs'][] = $this->title;
$search = "$('.search-button').click(function(){
	$('.search-form').toggle(1000);
	return false;
});";
$this->registerJs($search);
?>
<div class="mesa-index">

    <h1><?= Html::encode($this->title)." Cantidad: ".$dataProvider->count ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Mesa', ['create'], ['class' => 'btn btn-info']) ?>
        <?= Html::a('Invitados con Mesa ('.$cant_con_mesa.')', ['invitado_mesa', 'tipo' => 1], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Invitados sin Mesa ('.$cant_sin_mesa.')', ['invitado_mesa', 'tipo' => 0], ['class' => 'btn btn-warning']) ?>
    </p>
    <?php
    $gridColumn = [
       /* [
            'class' => 'yii\grid\SerialColumn',
            'contentOptions' => ['style' => 'width: 20px;'],
        ],*/
        [
            'class' => 'kartik\grid\ExpandRowColumn',
            'width' => '10px',
            'value' => function ($model, $key, $index, $column) {
                return GridView::ROW_COLLAPSED;
            },
            'detail' => function ($model, $key, $index, $column) {
                return Yii::$app->controller->renderPartial('_expand', ['model' => $model]);
            },
            'headerOptions' => ['class' => 'kartik-sheet-style'],
            'expandOneOnly' => true
        ],
        ['attribute' => 'id', 'visible' => false],
        [
            'attribute' => 'id_boda',
            'label' => 'Id Boda',
            'visible' => false,
            'value' => function($model){
                return $model->boda->id;
            },
            'filterType' => GridView::FILTER_SELECT2,
            'filter' => \yii\helpers\ArrayHelper::map(\app\models\Boda::find()->asArray()->all(), 'id', 'id'),
            'filterWidgetOptions' => [
                'pluginOptions' => ['allowClear' => true],
            ],
            'filterInputOptions' => ['placeholder' => 'Boda', 'id' => 'grid-mesa-search-id_boda']
        ],
        [
            'attribute' => 'nombre',
            'width' => '50px',
        ],
        [
            'attribute' => 'numero',
            'width' => '50px',
        ],
        [
            'attribute' => 'cantidad',
            'width' => '50px',
            'label' => 'Cantidad',
            'value' => function ($model, $key, $index, $column) {
                return sizeof($model->mesaInvitados);
            },
        ],
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{view} {update} {delete}',
            'buttons' => [
                'save-as-new' => function ($url) {
                    return Html::a('<span class="glyphicon glyphicon-copy"></span>', $url, ['title' => 'Save As New']);
                },
            ],
        ],

    ];
    ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumn,
        'pjax' => true,
        //'defaultPagination' => 'all',
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-mesa']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span>  ' . Html::encode($this->title),
        ],
        'export' => false,
        // your toolbar can include the additional full export menu
        'toolbar' => [
            '{export}',
            ExportMenu::widget([
                'dataProvider' => $dataProvider,
                'columns' => $gridColumn,
                'target' => ExportMenu::TARGET_BLANK,
                'fontAwesome' => true,
                'dropdownOptions' => [
                    'label' => 'Full',
                    'class' => 'btn btn-default',
                    'itemsBefore' => [
                        '<li class="dropdown-header">Export All Data</li>',
                    ],
                ],
                'exportConfig' => [
                    ExportMenu::FORMAT_PDF => false
                ]
            ]) ,
            '{toggleData}',
        ],
    ]); ?>

</div>