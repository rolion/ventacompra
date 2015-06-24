<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "detalle_nota_compra".
 *
 * @property integer $id
 * @property integer $id_nota_compra
 * @property integer $id_producto
 * @property integer $cantidad
 * @property string $precio_parcial
 *
 * @property NotaCompra $idNotaCompra
 * @property Producto $idProducto
 */
class DetalleNotaCompra extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'detalle_nota_compra';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_nota_compra', 'id_producto', 'cantidad', 'precio_parcial'], 'required'],
            [['id_nota_compra', 'id_producto', 'cantidad'], 'integer'],
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
            'id_nota_compra' => 'Id Nota Compra',
            'id_producto' => 'Id Producto',
            'cantidad' => 'Cantidad',
            'precio_parcial' => 'Precio Parcial',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdNotaCompra()
    {
        return $this->hasOne(NotaCompra::className(), ['id' => 'id_nota_compra']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdProducto()
    {
        return $this->hasOne(Producto::className(), ['id' => 'id_producto']);
    }
}
