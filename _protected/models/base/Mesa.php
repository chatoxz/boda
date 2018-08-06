<?php

namespace app\models\base;

use Yii;

/**
 * This is the base model class for table "mesa".
 *
 * @property integer $id
 * @property integer $id_boda
 * @property string $nombre
 * @property integer $numero
 *
 * @property \app\models\Boda $boda
 * @property \app\models\MesaInvitado[] $mesaInvitados
 */
class Mesa extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'boda',
            'mesaInvitados'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_boda'], 'required'],
            [['id', 'id_boda', 'numero'], 'integer'],
            [['nombre'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mesa';
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
            'numero' => 'Numero',
        ];
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
    public function getMesaInvitados()
    {
        return $this->hasMany(\app\models\MesaInvitado::className(), ['id_mesa' => 'id']);
    }
    

    /**
     * @inheritdoc
     * @return \app\models\MesaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\MesaQuery(get_called_class());
    }
}
