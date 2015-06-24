<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "detalle_nota_venta".
 *
 * @property integer $id
 * @property integer $id_nota_venta
 * @property integer $id_producto
 * @property integer $cantidad
 * @property string $precio_parcial
 *
 * @property NotaVenta $idNotaVenta
 * @property Producto $idProducto
 */
class DetalleNotaVenta extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'detalle_nota_venta';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_nota_venta', 'id_producto', 'cantidad', 'precio_parcial'], 'required'],
            [['id_nota_venta', 'id_producto', 'cantidad'], 'integer'],
            [['precio_parcial'], 'number']
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
            'id_producto' => 'Id Producto',
            'cantidad' => 'Cantidad',
            'precio_parcial' => 'Precio Parcial',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdNotaVenta()
    {
        return $this->hasOne(NotaVenta::className(), ['id' => 'id_nota_venta']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdProducto()
    {
        return $this->hasOne(Producto::className(), ['id' => 'id_producto']);
    }
}
