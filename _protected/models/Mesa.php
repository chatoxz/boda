<?php

namespace app\models;

use Yii;
use \app\models\base\Mesa as BaseMesa;

/**
 * This is the model class for table "mesa".
 */
class Mesa extends BaseMesa
{
    public $cantidad;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['id', 'id_boda'], 'required'],
            [['id', 'id_boda', 'numero'], 'integer'],
            [['nombre'], 'string', 'max' => 45]
        ]);
    }

    public function getCantidad(){
        return sizeof($this->mesaInvitados);
    }
	
}
