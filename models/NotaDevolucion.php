<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "nota_devolucion".
 *
 * @property integer $id
 * @property integer $id_nota_venta
 * @property integer $id_empleado
 * @property string $fecha
 * @property string $total_contra
 *
 * @property DetalleNotaDevolucion[] $detalleNotaDevolucions
 * @property Empleado $idEmpleado
 * @property NotaVenta $idNotaVenta
 */
class NotaDevolucion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'nota_devolucion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_nota_venta', 'id_empleado', 'total_contra'], 'required'],
            [['id_nota_venta', 'id_empleado'], 'integer'],
            [['fecha'], 'safe'],
            [['total_contra'], 'number']
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
            'id_empleado' => 'Id Empleado',
            'fecha' => 'Fecha',
            'total_contra' => 'Total Contra',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetalleNotaDevolucions()
    {
        return $this->hasMany(DetalleNotaDevolucion::className(), ['id_nota_dev' => 'id']);
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
    public function getIdNotaVenta()
    {
        return $this->hasOne(NotaVenta::className(), ['id' => 'id_nota_venta']);
    }
}
