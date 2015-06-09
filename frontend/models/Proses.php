<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "proses".
 *
 * @property integer $id
 * @property integer $jadi_id
 * @property integer $tugas_id
 * @property integer $urutan
 * @property integer $borong
 *
 * @property Jadi $jadi
 * @property Tugas $tugas
 */
class Proses extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'proses';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tugas_id'], 'required'],
            [['jadi_id', 'tugas_id', 'urutan', 'borong'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'jadi_id' => 'Jadi ID',
            'tugas_id' => 'Tugas ID',
            'urutan' => 'Urutan',
            'borong' => 'Borong',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJadi()
    {
        return $this->hasOne(Jadi::className(), ['id' => 'jadi_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTugas()
    {
        return $this->hasOne(Tugas::className(), ['id' => 'tugas_id']);
    }

    /**
     * @inheritdoc
     * @return ProsesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProsesQuery(get_called_class());
    }
}
