<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "plan_pago".
 *
 * @property integer $id
 * @property integer $id_nota_venta
 * @property string $fecha
 * @property string $precio_total
 * @property string $interes
 * @property string $montofinal
 * @property integer $nrocuotas
 * @property string $estado
 *
 * @property Cuota[] $cuotas
 * @property NotaVenta $idNotaVenta
 */
class PlanPago extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'plan_pago';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_nota_venta'], 'required'],
            [['id_nota_venta', 'nrocuotas'], 'integer'],
            [['fecha'], 'safe'],
            [['precio_total', 'interes', 'montofinal'], 'number'],
            [['estado'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_nota_venta' => 'Id Nota Venta',
            'fecha' => 'Fecha',
            'precio_total' => 'Precio Total',
            'interes' => 'Interes',
            'montofinal' => 'Montofinal',
            'nrocuotas' => 'Nrocuotas',
            'estado' => 'Estado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCuotas()
    {
        return $this->hasMany(Cuota::className(), ['id_plan_pago' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdNotaVenta()
    {
        return $this->hasOne(NotaVenta::className(), ['id' => 'id_nota_venta']);
    }
}
