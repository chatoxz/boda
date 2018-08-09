<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Mesa */

$this->title = 'Actualizar Mesa: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Mesa', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id, 'id_boda' => $model->id_boda]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mesa-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
