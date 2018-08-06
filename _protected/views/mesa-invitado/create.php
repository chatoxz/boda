<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MesaInvitado */

$this->title = 'Create Mesa Invitado';
$this->params['breadcrumbs'][] = ['label' => 'Mesa Invitado', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mesa-invitado-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
