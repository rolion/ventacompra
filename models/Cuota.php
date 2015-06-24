<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cuota".
 *
 * @property integer $id
 * @property integer $id_plan_pago
 * @property string $fecha_pago
 * @property string $monto
 * @property integer $id_estado_cuota
 *
 * @property EstadoCuota $idEstadoCuota
 * @property PlanPago $idPlanPago
 */
class Cuota extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cuota';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_plan_pago'], 'required'],
            [['id_plan_pago', 'id_estado_cuota'], 'integer'],
            [['fecha_pago'], 'safe'],
            [['monto'], 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_plan_pago' => 'Id Plan Pago',
            'fecha_pago' => 'Fecha Pago',
            'monto' => 'Monto',
            'id_estado_cuota' => 'Id Estado Cuota',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEstadoCuota()
    {
        return $this->hasOne(EstadoCuota::className(), ['id' => 'id_estado_cuota']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPlanPago()
    {
        return $this->hasOne(PlanPago::className(), ['id' => 'id_plan_pago']);
    }
}
