<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Invitado */

$this->title = 'Agregar Invitado';
$this->params['breadcrumbs'][] = ['label' => 'Invitado', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="invitado-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
