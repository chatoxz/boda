<?php

namespace app\models;

use Yii;
use \app\models\base\MesaInvitado as BaseMesaInvitado;

/**
 * This is the model class for table "mesa_invitado".
 */
class MesaInvitado extends BaseMesaInvitado
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['id_mesa', 'id_invitado'], 'required'],
            [['id_mesa', 'id_invitado'], 'integer'],
            [['id_invitado'], 'unique']
        ]);
    }
	
}
