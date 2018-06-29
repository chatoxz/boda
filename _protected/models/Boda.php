<?php

namespace app\models;

use Yii;
use \app\models\base\Boda as BaseBoda;

/**
 * This is the model class for table "boda".
 */
class Boda extends BaseBoda
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['id', 'id_novio', 'id_novia'], 'required'],
            [['id', 'id_novio', 'id_novia'], 'integer']
        ]);
    }
	
}
