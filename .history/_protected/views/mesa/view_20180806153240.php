<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Mesa */

$this->title = '';
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
                'visible' => false
            ],
            'nombre',
            'numero',
        ];?>
        <div class="col-md-4 col-sm-12">
            <?=  DetailView::widget([
                'model' => $model,
                'attributes' => $gridColumn
            ]);
            ?>
        </div>
        <?php
        $gridColumnBoda = [
            ['attribute' => 'id', 'visible' => false],
            'idPersona.nombre',
            'id_novia',
        ];
        /* echo DetailView::widget([
             'model' => $model->boda,
             'attributes' => $gridColumnBoda    ]);*/
        ?>

        <?php
        if($providerMesaInvitado->totalCount){
        $gridColumnMesaInvitado = [
            ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'id', 'visible' => false],
            [
                'attribute' => 'invitado.nombre',
                'label' => 'Nombres',
                'width' => '90%'
            ],
        ];
        ?>
        <div class="col-md-8 col-sm-12">
            <?=   Gridview::widget([
                'dataProvider' => $providerMesaInvitado,
                'pjax' => true,
                'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-mesa-invitado']],
                'panel' => [
                    'type' => GridView::TYPE_PRIMARY,
                    'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Invitados'),
                ],
                'export' => false,
                'columns' => $gridColumnMesaInvitado
            ]);
            }
            ?>
        </div>
    </div>

</div>
