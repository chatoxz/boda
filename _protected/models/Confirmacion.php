<?php

namespace app\models;

use Yii;
use \app\models\base\Confirmacion as BaseConfirmacion;

/**
 * This is the model class for table "confirmacion".
 */
class Confirmacion extends BaseConfirmacion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['nombre'], 'string', 'max' => 45],
            [['descripcion'], 'string', 'max' => 145]
        ]);
    }
	
}
