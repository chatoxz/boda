<?php

namespace app\models;

use Yii;
use \app\models\base\Invitado as BaseInvitado;

/**
 * This is the model class for table "invitado".
 */
class Invitado extends BaseInvitado
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
            [
                [['id', 'id_boda', 'nombre'], 'required'],
                [['id', 'id_boda', 'confirmacion'], 'integer'],
                [['mensaje'], 'string'],
                [['nombre'], 'string', 'max' => 255]
            ]);
    }

    public function getConfirmacion(){
        if($this->confirmacion == 0) return  'Sin Confirmar';
        if($this->confirmacion == 1) return  'Confirmado';
        if($this->confirmacion == 2) return  'No Asistira';
    }

}
