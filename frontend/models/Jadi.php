<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "jadi".
 *
 * @property integer $id
 * @property string $kode
 * @property string $nama
 * @property double $maxpct
 * @property integer $harga
 * @property double $borong
 *
 * @property Proses[] $proses
 */
class Jadi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jadi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kode'], 'required'],
            [['maxpct', 'borong'], 'number'],
            [['harga'], 'integer'],
            [['kode', 'nama'], 'string', 'max' => 30],
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
            'nama' => 'Nama',
            'maxpct' => '% Max',
            'harga' => 'Harga',
            'borong' => 'Borong',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProses()
    {
        return $this->hasMany(Proses::className(), ['jadi_id' => 'id'])->orderBy('urutan');
    }
}
