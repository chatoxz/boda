<?php

namespace app\models\base;

use Yii;

/**
 * This is the base model class for table "invitado".
 *
 * @property integer $id
 * @property integer $id_boda
 * @property string $nombre
 * @property integer $confirmacion
 * @property string $mensaje
 *
 * @property \app\models\Boda $boda
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
            'boda'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_boda', 'nombre'], 'required'],
            [['id', 'id_boda', 'confirmacion'], 'integer'],
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
            'confirmacion' => 'Confirmacion',
            'mensaje' => 'Mensaje',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBoda()
    {
        return $this->hasOne(\app\models\Boda::className(), ['id' => 'id_boda']);
    }
    }
