<?php
use yii\helpers\Html;
use kartik\tabs\TabsX;
use yii\helpers\Url;
$items = [
    /* [
         'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode('Mesa'),
         'content' => $this->render('_detail', [
             'model' => $model,
         ]),
     ],*/
    [
        'label' => '<div style="color: black"><i class="glyphicon glyphicon-book"></i> '. Html::encode('Invitados de la mesa')
            .'<div style="font-size: 18px" ># Cantidad de la mesa: '.$model->getCantidad().'</div>'.'</div>',
        'content' => $this->render('_dataMesaInvitado', [
            'model' => $model,
            'row' => $model->mesaInvitados,
        ]),
    ],
];
echo TabsX::widget([
    'items' => $items,
    'position' => TabsX::POS_ABOVE,
    'encodeLabels' => false,
    'class' => 'tes',
    'pluginOptions' => [
        'bordered' => true,
        'sideways' => true,
        'enableCache' => false
    ],
]);
?>
