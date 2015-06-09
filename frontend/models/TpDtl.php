<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tp_dtl".
 *
 * @property integer $id
 * @property integer $tp_id
 * @property integer $kain_dtl_id
 *
 * @property Tp $tp
 * @property KainDtl $kainDtl
 */
class TpDtl extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tp_dtl';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'tp_id', 'kain_dtl_id'], 'required'],
            [['id', 'tp_id', 'kain_dtl_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tp_id' => 'Tp ID',
            'kain_dtl_id' => 'Kain Dtl ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTp()
    {
        return $this->hasOne(Tp::className(), ['id' => 'tp_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKainDtl()
    {
        return $this->hasOne(KainDtl::className(), ['id' => 'kain_dtl_id']);
    }
}
