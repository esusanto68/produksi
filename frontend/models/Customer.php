<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "customer".
 *
 * @property integer $id
 * @property string $nama
 * @property string $kontak
 * @property string $alamat
 * @property string $kota
 * @property string $phone
 */
class Customer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'customer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama', 'kontak', 'alamat', 'kota', 'phone'], 'required'],
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
}
