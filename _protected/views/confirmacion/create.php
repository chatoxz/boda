<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Confirmacion */

$this->title = Yii::t('app', 'Create').' '.Yii::t('app', 'Confirmacion');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Confirmacion'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="confirmacion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
