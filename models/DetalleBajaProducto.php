<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "detalle_baja_producto".
 *
 * @property integer $id
 * @property integer $id_nota_baja
 * @property integer $id_producto
 * @property integer $id_almacen
 * @property integer $cantidad
 * @property string $motivo
 *
 * @property Almacen $idAlmacen
 * @property NotaBajaProducto $idNotaBaja
 * @property Producto $idProducto
 */
class DetalleBajaProducto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'detalle_baja_producto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_nota_baja', 'id_producto', 'id_almacen', 'cantidad', 'motivo'], 'required'],
            [['id_nota_baja', 'id_producto', 'id_almacen', 'cantidad'], 'integer'],
            [['motivo'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_nota_baja' => 'Id Nota Baja',
            'id_producto' => 'Id Producto',
            'id_almacen' => 'Id Almacen',
            'cantidad' => 'Cantidad',
            'motivo' => 'Motivo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdAlmacen()
    {
        return $this->hasOne(Almacen::className(), ['id' => 'id_almacen']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdNotaBaja()
    {
        return $this->hasOne(NotaBajaProducto::className(), ['id' => 'id_nota_baja']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdProducto()
    {
        return $this->hasOne(Producto::className(), ['id' => 'id_producto']);
    }
}
