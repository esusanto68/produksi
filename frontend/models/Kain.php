<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "kain".
 *
 * @property integer $id
 * @property string $kode
 * @property integer $harga
 * @property integer $sett
 *
 * @property Beli[] $belis
 * @property KainDtl[] $kainDtls
 */
class Kain extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kain';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kode'], 'required'],
            [['harga', 'sett'], 'integer'],
            [['kode'], 'string', 'max' => 30],
            [['kode'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kode' => 'Kode',
            'harga' => 'Harga',
            'sett' => 'Set',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBelis()
    {
        return $this->hasMany(Beli::className(), ['kain_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKainDtls()
    {
        return $this->hasMany(KainDtl::className(), ['kain_id' => 'id']);
    }
}
