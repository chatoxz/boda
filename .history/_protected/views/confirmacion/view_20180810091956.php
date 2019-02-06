<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Confirmacion */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Confirmacion'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="confirmacion-view container-fluid">

    <div class="row">
        <div class="col-md-6  col-sm-8">
            <h2><?= Yii::t('app', 'Confirmacion').' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-md-5 col-sm-4" style="margin: 15px">
            <?= Html::a(Yii::t('app', 'Save As New'), ['save-as-new', 'id' => $model->id], 
['class' => 'btn btn-info add-modal-data', 'title' => Yii::t('app', 'Save As New'), 'style' => 'margin-bottom:15px' ]) ?>            
            <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], 
            ['class' => 'btn btn-primary add-modal-data', 'title' => Yii::t('app', 'Update'), 'style' => 'margin-bottom:15px']) ?>
            <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'style' => 'margin-bottom:15px',
                'data' => [
                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ])
            ?>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'visible' => false],
        'nombre',
        'descripcion',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]);
?>
    </div>
    
    <div class="row">
<?php
if($providerInvitado->totalCount){
    $gridColumnInvitado = [
        ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'id', 'visible' => false],
            [
                'attribute' => 'boda.id',
                'label' => Yii::t('app', 'Id Boda')
            ],
            'nombre',
                        'mensaje:ntext',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerInvitado,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-invitado']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode(Yii::t('app', 'Invitado')),
        ],
        'export' => false,
        'columns' => $gridColumnInvitado
    ]);
}
?>

    </div>
</div>
