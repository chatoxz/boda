<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[MesaInvitado]].
 *
 * @see MesaInvitado
 */
class MesaInvitadoQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return MesaInvitado[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return MesaInvitado|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
