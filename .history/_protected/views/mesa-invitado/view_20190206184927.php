<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\MesaInvitado */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Mesa Invitado', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mesa-invitado-view">

    <div class="row">
        <div class="col-sm-8">
            <h2><?= 'Mesa Invitado'.' '. Html::encode($this->title) ?>
            </h2>
        </div>
        <div class="col-sm-4" style="margin-top: 15px">
            <?= Html::a('Save As New', ['save-as-new', 'id' => $model->id], ['class' => 'btn btn-info']) ?>
            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('Are you sure you want to delete this item?'),,
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
            'attribute' => 'mesa.id',
            'label' => 'Id Mesa',
        ],
        [
            'attribute' => 'invitado.id',
            'label' => 'Id Invitado',
        ],
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]);
?>
    </div>
    <div class="row">
        <h4>Invitado<?= ' '. Html::encode($this->title) ?>
        </h4>
    </div>
    <?php
    $gridColumnInvitado = [
        ['attribute' => 'id', 'visible' => false],
        'id_boda',
        'nombre',
        'confirmacion',
        'mensaje',
    ];
    echo DetailView::widget([
        'model' => $model->invitado,
        'attributes' => $gridColumnInvitado    ]);
    ?>
    <div class="row">
        <h4>Mesa<?= ' '. Html::encode($this->title) ?>
        </h4>
    </div>
    <?php
    $gridColumnMesa = [
        ['attribute' => 'id', 'visible' => false],
        'id_boda',
        'nombre',
        'numero',
    ];
    echo DetailView::widget([
        'model' => $model->mesa,
        'attributes' => $gridColumnMesa    ]);
    ?>
</div>