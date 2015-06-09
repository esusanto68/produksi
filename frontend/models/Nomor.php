<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "nomor".
 *
 * @property string $kode
 * @property integer $nomor
 * @property integer $length
 */
class Nomor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'nomor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kode', 'nomor', 'length'], 'required'],
            [['nomor', 'length'], 'integer'],
            [['kode'], 'string', 'max' =>6]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'kode' => 'Kode',
            'nomor' => 'Nomor',
            'length' => 'Length',
        ];
    }
}
