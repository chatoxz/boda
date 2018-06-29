<?php

namespace app\models\base;

use Yii;

/**
 * This is the base model class for table "boda".
 *
 * @property integer $id
 * @property integer $id_novio
 * @property integer $id_novia
 *
 * @property \app\models\Persona $novia
 * @property \app\models\Persona $novio
 * @property \app\models\Cliente[] $clientes
 * @property \app\models\ContactoInvitado[] $contactoInvitados
 * @property \app\models\Foto[] $fotos
 * @property \app\models\Invitado[] $invitados
 * @property \app\models\Regalo[] $regalos
 */
class Boda extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'novia',
            'novio',
            'clientes',
            'contactoInvitados',
            'fotos',
            'invitados',
            'regalos'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_novio', 'id_novia'], 'required'],
            [['id', 'id_novio', 'id_novia'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'boda';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_novio' => 'Id Novio',
            'id_novia' => 'Id Novia',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNovia()
    {
        return $this->hasOne(\app\models\Persona::className(), ['id' => 'id_novia']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNovio()
    {
        return $this->hasOne(\app\models\Persona::className(), ['id' => 'id_novio']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClientes()
    {
        return $this->hasMany(\app\models\Cliente::className(), ['id_boda' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContactoInvitados()
    {
        return $this->hasMany(\app\models\ContactoInvitado::className(), ['id_boda' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFotos()
    {
        return $this->hasMany(\app\models\Foto::className(), ['id_boda' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvitados()
    {
        return $this->hasMany(\app\models\Invitado::className(), ['id_boda' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegalos()
    {
        return $this->hasMany(\app\models\Regalo::className(), ['id_boda' => 'id']);
    }
    }
