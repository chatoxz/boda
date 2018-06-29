<?php

namespace app\models\base;

use Yii;

/**
 * This is the base model class for table "persona".
 *
 * @property integer $id
 * @property string $nombre
 * @property string $apellido
 * @property integer $celular
 * @property string $email
 * @property string $pagina
 *
 * @property \app\models\Boda[] $bodas
 * @property \app\models\Padrino[] $padrinos
 * @property \app\models\RedSocial[] $redSocials
 */
class Persona extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'bodas',
            'padrinos',
            'redSocials'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'celular'], 'integer'],
            [['nombre', 'apellido', 'email', 'pagina'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'persona';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'apellido' => 'Apellido',
            'celular' => 'Celular',
            'email' => 'Email',
            'pagina' => 'Pagina',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBodas()
    {
        return $this->hasMany(\app\models\Boda::className(), ['id_novio' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPadrinos()
    {
        return $this->hasMany(\app\models\Padrino::className(), ['id_persona' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRedSocials()
    {
        return $this->hasMany(\app\models\RedSocial::className(), ['id_persona' => 'id']);
    }
    }
