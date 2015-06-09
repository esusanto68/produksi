<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tugas".
 *
 * @property integer $id
 * @property string $keterangan
 * @property integer $borong
 *
 * @property Proses[] $proses
 */
class Tugas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tugas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['keterangan', 'borong'], 'required'],
            [['borong'], 'integer'],
            [['keterangan'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'keterangan' => 'Keterangan',
            'borong' => 'Borong',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProses()
    {
        return $this->hasMany(Proses::className(), ['tugas_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return TugasQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TugasQuery(get_called_class());
    }
}
