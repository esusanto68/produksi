<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "aksesoris".
 *
 * @property integer $id
 * @property string $nama
 * @property string $kode
 */
class Aksesoris extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'aksesoris';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama', 'kode'], 'required'],
            [['nama'], 'string', 'max' => 30],
            [['kode'], 'string', 'max' => 15],
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
            'nama' => 'Nama',
            'kode' => 'Kode',
        ];
    }
}
