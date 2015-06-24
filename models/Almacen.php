<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "almacen".
 *
 * @property integer $id
 * @property string $nombre
 * @property string $direccion
 * @property integer $Eliminado
 *
 * @property DetalleBajaProducto[] $detalleBajaProductos
 * @property Stock[] $stocks
 */
class Almacen extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'almacen';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['Eliminado'], 'integer'],
            [['nombre'], 'string', 'max' => 50],
            [['direccion'], 'string', 'max' => 100]
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
            'direccion' => 'Direccion',
            'Eliminado' => 'Eliminado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetalleBajaProductos()
    {
        return $this->hasMany(DetalleBajaProducto::className(), ['id_almacen' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStocks()
    {
        return $this->hasMany(Stock::className(), ['id_almacen' => 'id']);
    }
}
