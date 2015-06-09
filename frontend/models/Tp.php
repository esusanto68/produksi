<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tp".
 *
 * @property integer $id
 * @property string $no_tp
 * @property string $tgl_potong
 * @property integer $roll
 * @property integer $kain_id
 * @property double $total_berat
 * @property integer $potongan
 * @property integer $pot_dzn
 * @property integer $pot_pcs
 * @property double $prosentase
 * @property integer $sablon
 * @property integer $sab_dzn
 * @property integer $sab_pcs
 *
 * @property KainDtl[] $kainDtls
 * @property TpDtl[] $tpDtls
 */
class Tp extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tp';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'no_tp', 'tgl_potong', 'roll', 'kain_id', 'total_berat', 'potongan', 'pot_dzn', 'pot_pcs', 'prosentase', 'sablon', 'sab_dzn', 'sab_pcs'], 'required'],
            [['id', 'roll', 'kain_id', 'potongan', 'pot_dzn', 'pot_pcs', 'sablon', 'sab_dzn', 'sab_pcs'], 'integer'],
            [['tgl_potong'], 'safe'],
            [['total_berat', 'prosentase'], 'number'],
            [['no_tp'], 'string', 'max' => 10],
            [['no_tp'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'no_tp' => 'No Tp',
            'tgl_potong' => 'Tgl Potong',
            'roll' => 'Roll',
            'kain_id' => 'Kain ID',
            'total_berat' => 'Total Berat',
            'potongan' => 'Potongan',
            'pot_dzn' => 'Pot Dzn',
            'pot_pcs' => 'Pot Pcs',
            'prosentase' => 'Prosentase',
            'sablon' => 'Sablon',
            'sab_dzn' => 'Sab Dzn',
            'sab_pcs' => 'Sab Pcs',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKainDtls()
    {
        return $this->hasMany(KainDtl::className(), ['tp_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTpDtls()
    {
        return $this->hasMany(TpDtl::className(), ['tp_id' => 'id']);
    }
}
