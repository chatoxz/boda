<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MesaInvitado */

$this->title = 'Update Mesa Invitado: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Mesa Invitado', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mesa-invitado-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
