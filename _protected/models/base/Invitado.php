<?php

namespace app\models\base;

use Yii;

/**
 * This is the base model class for table "invitado".
 *
 * @property integer $id
 * @property integer $id_boda
 * @property string $nombre
 * @property integer $id_confirmacion
 * @property string $mensaje
 *
 * @property \app\models\Confirmacion $confirmacion
 * @property \app\models\Boda $boda
 * @property \app\models\MesaInvitado $mesaInvitado
 */
class Invitado extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'confirmacion',
            'boda',
            'mesaInvitado'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_boda', 'nombre'], 'required'],
            [['id', 'id_boda', 'id_confirmacion'], 'integer'],
            [['mensaje'], 'string'],
            [['nombre'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'invitado';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_boda' => 'Id Boda',
            'nombre' => 'Nombre',
            'id_confirmacion' => 'Id Confirmacion',
            'mensaje' => 'Mensaje',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConfirmacion()
    {
        return $this->hasOne(\app\models\Confirmacion::className(), ['id' => 'id_confirmacion']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBoda()
    {
        return $this->hasOne(\app\models\Boda::className(), ['id' => 'id_boda']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMesaInvitado()
    {
        return $this->hasOne(\app\models\MesaInvitado::className(), ['id_invitado' => 'id']);
    }
    

    /**
     * @inheritdoc
     * @return \app\models\InvitadoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\InvitadoQuery(get_called_class());
    }
}
