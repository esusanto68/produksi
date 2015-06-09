<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "kain_dtl".
 *
 * @property integer $id
 * @property integer $beli_id
 * @property integer $kain_id
 * @property string $tgl_beli
 * @property string $no_urut
 * @property double $berat
 * @property string $tgl_potong
 * @property integer $tp_id
 *
 * @property Kain $kain
 * @property Tp $tp
 * @property Beli $beli
 * @property TpDtl[] $tpDtls
 */
class KainDtl extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kain_dtl';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kain_id', 'tgl_beli','berat'], 'required'],
            [['beli_id', 'kain_id', 'tp_id'], 'integer'],
            [['tgl_beli', 'tgl_potong'], 'safe'],
            [['berat'], 'number'],
            [['no_urut'], 'string', 'max' => 6],
            //[['no_urut'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'beli_id' => 'Beli ID',
            'kain_id' => 'Kain ID',
            'tgl_beli' => 'Tgl Beli',
            'no_urut' => 'No Urut',
            'berat' => 'Berat',
            'tgl_potong' => 'Tgl Potong',
            'tp_id' => 'Tp ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKain()
    {
        return $this->hasOne(Kain::className(), ['id' => 'kain_id']);
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
    public function getBeli()
    {
        return $this->hasOne(Beli::className(), ['id' => 'beli_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTpDtls()
    {
        return $this->hasMany(TpDtl::className(), ['kain_dtl_id' => 'id']);
    }
}
