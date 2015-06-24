<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "detalle_nota_servicio".
 *
 * @property integer $id
 * @property integer $id_nota_servicio
 * @property integer $id_servicio
 * @property string $precio_unitario
 * @property integer $cantidad
 * @property string $precio_parcial
 *
 * @property NotaServicio $idNotaServicio
 * @property Servicio $idServicio
 */
class DetalleNotaServicio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'detalle_nota_servicio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_nota_servicio', 'id_servicio', 'precio_unitario', 'cantidad', 'precio_parcial'], 'required'],
            [['id_nota_servicio', 'id_servicio', 'cantidad'], 'integer'],
            [['precio_unitario', 'precio_parcial'], 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_nota_servicio' => 'Id Nota Servicio',
            'id_servicio' => 'Id Servicio',
            'precio_unitario' => 'Precio Unitario',
            'cantidad' => 'Cantidad',
            'precio_parcial' => 'Precio Parcial',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdNotaServicio()
    {
        return $this->hasOne(NotaServicio::className(), ['id' => 'id_nota_servicio']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdServicio()
    {
        return $this->hasOne(Servicio::className(), ['id' => 'id_servicio']);
    }
}
