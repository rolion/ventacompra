<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "nota_baja_producto".
 *
 * @property integer $id
 * @property string $fecha
 * @property integer $id_empleado
 *
 * @property DetalleBajaProducto[] $detalleBajaProductos
 * @property Empleado $idEmpleado
 */
class NotaBajaProducto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'nota_baja_producto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fecha'], 'safe'],
            [['id_empleado'], 'required'],
            [['id_empleado'], 'integer']
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetalleBajaProductos()
    {
        return $this->hasMany(DetalleBajaProducto::className(), ['id_nota_baja' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEmpleado()
    {
        return $this->hasOne(Empleado::className(), ['Id' => 'id_empleado']);
    }
}
