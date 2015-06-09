<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "supplier".
 *
 * @property integer $id
 * @property string $nama
 * @property string $kontak
 * @property string $alamat
 * @property string $kota
 * @property string $phone
 *
 * @property Kain[] $kains
 */
class Supplier extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'supplier';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama'], 'required'],
            [['nama'], 'unique'],
            [['nama', 'kontak', 'alamat'], 'string', 'max' => 100],
            [['kota', 'phone'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'kontak' => 'Kontak',
            'alamat' => 'Alamat',
            'kota' => 'Kota',
            'phone' => 'Phone',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKains()
    {
        return $this->hasMany(Kain::className(), ['supplier_id' => 'id']);
    }
}
