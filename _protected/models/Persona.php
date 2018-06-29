<?php

namespace app\models;

use Yii;
use \app\models\base\Persona as BasePersona;

/**
 * This is the model class for table "persona".
 */
class Persona extends BasePersona
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['id'], 'required'],
            [['id', 'celular'], 'integer'],
            [['nombre', 'apellido', 'email', 'pagina'], 'string', 'max' => 255]
        ]);
    }
	
}
