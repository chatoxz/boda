<?php

namespace app\models\base;

use Yii;

/**
 * This is the base model class for table "mesa_invitado".
 *
 * @property integer $id
 * @property integer $id_mesa
 * @property integer $id_invitado
 *
 * @property \app\models\Invitado $invitado
 * @property \app\models\Mesa $mesa
 */
class MesaInvitado extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'invitado',
            'mesa'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_mesa', 'id_invitado'], 'required'],
            [['id_mesa', 'id_invitado'], 'integer'],
            [['id_invitado'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mesa_invitado';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_mesa' => 'Id Mesa',
            'id_invitado' => 'Id Invitado',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvitado()
    {
        return $this->hasOne(\app\models\Invitado::className(), ['id' => 'id_invitado']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMesa()
    {
        return $this->hasOne(\app\models\Mesa::className(), ['id' => 'id_mesa']);
    }
    

    /**
     * @inheritdoc
     * @return \app\models\MesaInvitadoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\MesaInvitadoQuery(get_called_class());
    }
}
