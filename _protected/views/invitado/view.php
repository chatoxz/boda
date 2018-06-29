<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Invitado */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Invitado', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="invitado-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Invitado'.' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-3" style="margin-top: 15px">
            
            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
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
        'confirmacion',
        'mensaje:ntext',
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
</div>
