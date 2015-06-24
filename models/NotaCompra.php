<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "nota_compra".
 *
 * @property integer $id
 * @property string $fecha
 * @property integer $id_empleado
 * @property integer $id_proveedor
 * @property string $total_pagar
 *
 * @property DetalleNotaCompra[] $detalleNotaCompras
 * @property Empleado $idEmpleado
 * @property Proveedor $idProveedor
 */
class NotaCompra extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'nota_compra';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fecha'], 'safe'],
            [['id_empleado', 'id_proveedor', 'total_pagar'], 'required'],
            [['id_empleado', 'id_proveedor'], 'integer'],
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
            'id_proveedor' => 'Id Proveedor',
            'total_pagar' => 'Total Pagar',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetalleNotaCompras()
    {
        return $this->hasMany(DetalleNotaCompra::className(), ['id_nota_compra' => 'id']);
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
    public function getIdProveedor()
    {
        return $this->hasOne(Proveedor::className(), ['id' => 'id_proveedor']);
    }
}
