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
                [['id', 'id_boda', 'id_confirmacion'], 'integer'],
                [['mensaje'], 'string'],
                [['nombre'], 'string', 'max' => 255]
            ]);
    }


}
