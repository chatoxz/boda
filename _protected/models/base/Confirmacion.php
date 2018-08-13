<?php

namespace app\models\base;

use Yii;

/**
 * This is the base model class for table "confirmacion".
 *
 * @property integer $id
 * @property string $nombre
 * @property string $descripcion
 *
 * @property \app\models\Invitado[] $invitados
 */
class Confirmacion extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'invitados'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre'], 'string', 'max' => 45],
            [['descripcion'], 'string', 'max' => 145]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'confirmacion';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'descripcion' => 'Descripcion',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvitados()
    {
        return $this->hasMany(\app\models\Invitado::className(), ['id_confirmacion' => 'id']);
    }
    

    /**
     * @inheritdoc
     * @return \app\models\ConfirmacionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\ConfirmacionQuery(get_called_class());
    }
}
