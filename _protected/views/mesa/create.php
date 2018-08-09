<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Mesa */

$this->title = 'Crear nueva Mesa';
$this->params['breadcrumbs'][] = ['label' => 'Mesa', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mesa-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
