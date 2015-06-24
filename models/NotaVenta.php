<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "nota_venta".
 *
 * @property integer $id
 * @property string $fecha
 * @property integer $id_empleado
 * @property integer $id_cliente
 * @property string $total_pagar
 *
 * @property DetalleNotaVenta[] $detalleNotaVentas
 * @property NotaDevolucion[] $notaDevolucions
 * @property Cliente $idCliente
 * @property Empleado $idEmpleado
 * @property PlanPago[] $planPagos
 */
class NotaVenta extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'nota_venta';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fecha'], 'safe'],
            [['id_cliente', 'total_pagar'], 'required'],
            [['id_empleado', 'id_cliente'], 'integer'],
            [['total_pagar'], 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fecha' => 'Fecha',
            'id_empleado' => 'Id Empleado',
            'id_cliente' => 'Id Cliente',
            'total_pagar' => 'Total Pagar',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetalleNotaVentas()
    {
        return $this->hasMany(DetalleNotaVenta::className(), ['id_nota_venta' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNotaDevolucions()
    {
        return $this->hasMany(NotaDevolucion::className(), ['id_nota_venta' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCliente()
    {
        return $this->hasOne(Cliente::className(), ['id' => 'id_cliente']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEmpleado()
    {
        return $this->hasOne(Empleado::className(), ['Id' => 'id_empleado']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlanPagos()
    {
        return $this->hasMany(PlanPago::className(), ['id_nota_venta' => 'id']);
    }
}
