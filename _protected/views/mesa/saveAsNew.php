<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Mesa */

$this->title = 'Save As New Mesa: '. ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Mesa', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id, 'id_boda' => $model->id_boda]];
$this->params['breadcrumbs'][] = 'Save As New';
?>
<div class="mesa-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
