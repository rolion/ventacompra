<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "empleado".
 *
 * @property integer $Id
 * @property string $Apellido
 * @property string $Nombre
 * @property string $Ci
 * @property integer $Telefono
 * @property string $Direccion
 * @property integer $Id_Tipo_Empleado
 * @property integer $Eliminado
 *
 * @property TipoEmpleado $idTipoEmpleado
 * @property NotaBajaProducto[] $notaBajaProductos
 * @property NotaCompra[] $notaCompras
 * @property NotaDevolucion[] $notaDevolucions
 * @property NotaVenta[] $notaVentas
 * @property Usuario[] $usuarios
 */
class Empleado extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'empleado';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Apellido', 'Nombre'], 'required'],
            [['Telefono', 'Id_Tipo_Empleado', 'Eliminado'], 'integer'],
            [['Apellido', 'Nombre'], 'string', 'max' => 50],
            [['Ci'], 'string', 'max' => 15],
            [['Direccion'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'Apellido' => 'Apellido',
            'Nombre' => 'Nombre',
            'Ci' => 'Ci',
            'Telefono' => 'Telefono',
            'Direccion' => 'Direccion',
            'Id_Tipo_Empleado' => 'Id  Tipo  Empleado',
            'Eliminado' => 'Eliminado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTipoEmpleado()
    {
        return $this->hasOne(TipoEmpleado::className(), ['Id' => 'Id_Tipo_Empleado']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNotaBajaProductos()
    {
        return $this->hasMany(NotaBajaProducto::className(), ['id_empleado' => 'Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNotaCompras()
    {
        return $this->hasMany(NotaCompra::className(), ['id_empleado' => 'Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNotaDevolucions()
    {
        return $this->hasMany(NotaDevolucion::className(), ['id_empleado' => 'Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNotaVentas()
    {
        return $this->hasMany(NotaVenta::className(), ['id_empleado' => 'Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarios()
    {
        return $this->hasMany(Usuario::className(), ['Id_Empleado' => 'Id']);
    }
}
