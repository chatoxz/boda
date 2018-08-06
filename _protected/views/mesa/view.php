<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Mesa */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Mesa', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mesa-view">

    <div class="row">
        <div class="col-sm-8">
            <h2><?= 'Mesa'.' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-4" style="margin-top: 15px">
            <?= Html::a('Save As New', ['save-as-new', 'id' => $model->id, 'id_boda' => $model->id_boda], ['class' => 'btn btn-info']) ?>            
            <?= Html::a('Update', ['update', 'id' => $model->id, 'id_boda' => $model->id_boda], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id, 'id_boda' => $model->id_boda], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => '¿Está seguro de eliminar este elemento?',
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
        [
            'attribute' => 'boda.id',
            'label' => 'Id Boda',
        ],
        'nombre',
        'numero',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]);
?>
    </div>
    <div class="row">
        <h4>Boda<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnBoda = [
        ['attribute' => 'id', 'visible' => false],
        'id_novio',
        'id_novia',
    ];
    echo DetailView::widget([
        'model' => $model->boda,
        'attributes' => $gridColumnBoda    ]);
    ?>
    
    <div class="row">
<?php
if($providerMesaInvitado->totalCount){
    $gridColumnMesaInvitado = [
        ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'id', 'visible' => false],
                        [
                'attribute' => 'invitado.id',
                'label' => 'Id Invitado'
            ],
    ];
    echo Gridview::widget([
        'dataProvider' => $providerMesaInvitado,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-mesa-invitado']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Mesa Invitado'),
        ],
        'export' => false,
        'columns' => $gridColumnMesaInvitado
    ]);
}
?>

    </div>
</div>
