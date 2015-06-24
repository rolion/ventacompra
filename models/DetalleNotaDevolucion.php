<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "detalle_nota_devolucion".
 *
 * @property integer $id
 * @property integer $id_nota_dev
 * @property integer $id_producto
 * @property integer $cantidad
 * @property string $motivo
 * @property string $total_parcial
 *
 * @property NotaDevolucion $idNotaDev
 * @property Producto $idProducto
 */
class DetalleNotaDevolucion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'detalle_nota_devolucion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_nota_dev', 'id_producto', 'cantidad'], 'required'],
            [['id_nota_dev', 'id_producto', 'cantidad'], 'integer'],
            [['total_parcial'], 'number'],
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
            'id_nota_dev' => 'Id Nota Dev',
            'id_producto' => 'Id Producto',
            'cantidad' => 'Cantidad',
            'motivo' => 'Motivo',
            'total_parcial' => 'Total Parcial',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdNotaDev()
    {
        return $this->hasOne(NotaDevolucion::className(), ['id' => 'id_nota_dev']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdProducto()
    {
        return $this->hasOne(Producto::className(), ['id' => 'id_producto']);
    }
}
