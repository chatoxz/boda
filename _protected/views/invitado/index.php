<?php

/* @var $this yii\web\View */
/* @var $searchModel app\models\InvitadoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $model app\models\Invitado */

use yii\helpers\Html;
use yii\helpers\Url;
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
<div class="invitado-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="row">
        <div class="col-xs-12 col-md-12 wrap_invitados_buttons" style="">
            <?php $url = Url::toRoute(['/invitado/index', 'tipo_invitado' => 3]); ?>
            <a href="<?= $url ?>"> <div class="alert alert-info"><?= "Todos: ".$todos ?></div></a>
            <?php $url = Url::toRoute(['/invitado/index', 'tipo_invitado' => 0]); ?>
            <a href="<?= $url ?>"> <div class="alert alert-warning"><?= "Sin confirmar: ".$sin_confirmar ?></div></a>
            <?php $url = Url::toRoute(['/invitado/index', 'tipo_invitado' => 1]); ?>
            <a href="<?= $url ?>"><div class="alert alert-success"><?= "Confirmados: ".$confirmados ?></div></a>
            <?php $url = Url::toRoute(['/invitado/index', 'tipo_invitado' => 2]); ?>
            <a href="<?= $url ?>"><div class="alert alert-danger"><?= "No asistiran: ".$no_iran ?></div></a>
            <?php $url = Url::toRoute(['invitado/create']); ?>
            <?= Html::button('Agregar Invitado', ['value' => $url , 'class' => 'alert alert-info modalButton','title' => 'Crear', 'sytle' => 'align-self: right']) ?>
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
            'attribute' => 'id_confirmacion',
            'label' => 'Confirmacion',
            'value' => function($model){
                return $model->confirmacion->nombre;
            },
            'filterType' => GridView::FILTER_SELECT2,
            'filter' => \yii\helpers\ArrayHelper::map(\app\models\Confirmacion::find()->asArray()->all(), 'id', 'nombre'),
            'filterWidgetOptions' => [
                'pluginOptions' => ['allowClear' => true],
            ],
            'filterInputOptions' => ['placeholder' => 'Confirmacion', 'id' => 'grid-invitado-search-id_confirmacion']
        ],
        [
            'attribute' => 'mesaInvitado.id_mesa',
            'width' => '50px',
            'label' => 'Mesa',
            'value' => function ($model) {
                if($model->mesaInvitado){
                    return $model->mesaInvitado->mesa->nombre;
                }else{
                    return '';
                }
            },
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
        'pjaxSettings' => ['options' => ['id' => 'id_gridview']],
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
