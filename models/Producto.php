<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "producto".
 *
 * @property integer $id
 * @property string $nombre
 * @property string $descripcion
 * @property string $precio
 * @property integer $id_tipo_producto
 * @property integer $Eliminado
 *
 * @property DetalleBajaProducto[] $detalleBajaProductos
 * @property DetalleNotaCompra[] $detalleNotaCompras
 * @property DetalleNotaDevolucion[] $detalleNotaDevolucions
 * @property DetalleNotaVenta[] $detalleNotaVentas
 * @property TipoProducto $idTipoProducto
 * @property Stock[] $stocks
 */
class Producto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'producto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['precio'], 'number'],
            [['id_tipo_producto', 'Eliminado'], 'integer'],
            [['nombre'], 'string', 'max' => 50],
            [['descripcion'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'descripcion' => 'Descripcion',
            'precio' => 'Precio',
            'id_tipo_producto' => 'Id Tipo Producto',
            'Eliminado' => 'Eliminado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetalleBajaProductos()
    {
        return $this->hasMany(DetalleBajaProducto::className(), ['id_producto' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetalleNotaCompras()
    {
        return $this->hasMany(DetalleNotaCompra::className(), ['id_producto' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetalleNotaDevolucions()
    {
        return $this->hasMany(DetalleNotaDevolucion::className(), ['id_producto' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetalleNotaVentas()
    {
        return $this->hasMany(DetalleNotaVenta::className(), ['id_producto' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTipoProducto()
    {
        return $this->hasOne(TipoProducto::className(), ['id' => 'id_tipo_producto']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStocks()
    {
        return $this->hasMany(Stock::className(), ['id_producto' => 'id']);
    }
}
