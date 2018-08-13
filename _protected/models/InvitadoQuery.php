<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Invitado]].
 *
 * @see Invitado
 */
class InvitadoQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Invitado[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Invitado|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
