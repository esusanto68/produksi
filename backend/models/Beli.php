<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "beli".
 *
 * @property integer $id
 * @property string $nomor
 * @property integer $supplier_id
 * @property string $tanggal
 * @property integer $kain_id
 * @property integer $harga
 * @property integer $sett
 * @property double $total_berat
 * @property string $no_nota
 *
 * @property Supplier $supplier
 * @property Kain $kain
 * @property KainDtl[] $kainDtls
 */
class Beli extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'beli';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nomor', 'supplier_id', 'tanggal', 'kain_id', 'harga', 'sett', 'total_berat', 'no_nota'], 'required'],
            [['supplier_id', 'kain_id', 'harga', 'sett'], 'integer'],
            [['tanggal'], 'safe'],
            [['total_berat'], 'number'],
            [['nomor'], 'string', 'max' => 6],
            [['no_nota'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nomor' => 'Nomor',
            'supplier_id' => 'Supplier ID',
            'tanggal' => 'Tanggal',
            'kain_id' => 'Kain ID',
            'harga' => 'Harga',
            'sett' => 'Sett',
            'total_berat' => 'Total Berat',
            'no_nota' => 'No Nota',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSupplier()
    {
        return $this->hasOne(Supplier::className(), ['id' => 'supplier_id']);
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
    public function getKainDtls()
    {
        return $this->hasMany(KainDtl::className(), ['beli_id' => 'id']);
    }
}
