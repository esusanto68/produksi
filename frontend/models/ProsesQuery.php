<?php

namespace frontend\models;

/**
 * This is the ActiveQuery class for [[Proses]].
 *
 * @see Proses
 */
class ProsesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Proses[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Proses|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}