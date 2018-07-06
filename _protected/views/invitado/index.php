<?php

/* @var $this yii\web\View */
/* @var $searchModel app\models\InvitadoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\helpers\Html;
use kartik\export\ExportMenu;
use kartik\grid\GridView;

$this->title = 'Invitado';
$this->params['breadcrumbs'][] = $this->title;
$search = "$('.search-button').click(function(){
	$('.search-form').toggle(1000);
	return false;
});";
$this->registerJs($search);
?>
<div class="invitado-index" >

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="row">
        <div class="col-xs-12 col-md-12" style="display: flex;justify-content: space-around;flex-wrap: wrap;font-size: 18px">
            <div class="alert alert-warning"><?= "Sin confirmar: ".$sin_confirmar ?></div>
            <div class="alert alert-success"><?= "Confirmados: ".$confirmados ?></div>
            <div class="alert alert-danger"><?= "No asistiran: ".$no_iran ?></div>
            <div style="align-self: right"><?= Html::a('Agregar Invitado', ['create'], ['class' => 'btn btn-info']) ?></div>
        </div>
        <!--<?php //echo Html::a('Advance Search', '#', ['class' => 'btn btn-info search-button']) ?>-->
    </div>
    <div class="clearfix"></div>
    <?php
    $gridColumn = [
        ['class' => 'yii\grid\SerialColumn'],
        //['attribute' => 'id', 'visible' => false],
        /*[
                'attribute' => 'id_boda',
                'label' => 'Id Boda',
                'value' => function($model){
                    return $model->boda->id;
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => \yii\helpers\ArrayHelper::map(\app\models\Boda::find()->asArray()->all(), 'id', 'id'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'Boda', 'id' => 'grid-invitado-search-id_boda']
            ],*/
        'nombre',
        [
            'attribute' => 'confirmacion',
            'label' => 'Confirmacion',
            'value' => function($model){
                if($model->confirmacion == 0)
                    return "Sin confirmar";
                if($model->confirmacion == 1)
                    return "Confirmado";
                if($model->confirmacion == 2)
                    return "No asistira";
            }
        ],
        //'confirmacion',
        'mensaje:ntext',
        [
            'class' => 'yii\grid\ActionColumn',
        ],
    ];
    ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumn,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-invitado']],
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
        ],
    ]); ?>

</div>
