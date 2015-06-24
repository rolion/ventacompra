<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "nota_servicio".
 *
 * @property integer $id
 * @property string $fecha
 * @property integer $id_cliente
 * @property string $monto_total
 * @property integer $terminado
 *
 * @property DetalleNotaServicio[] $detalleNotaServicios
 * @property Cliente $idCliente
 */
class NotaServicio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'nota_servicio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fecha'], 'safe'],
            [['id_cliente'], 'required'],
            [['id_cliente', 'terminado'], 'integer'],
            [['monto_total'], 'number']
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
            'id_cliente' => 'Id Cliente',
            'monto_total' => 'Monto Total',
            'terminado' => 'Terminado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetalleNotaServicios()
    {
        return $this->hasMany(DetalleNotaServicio::className(), ['id_nota_servicio' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCliente()
    {
        return $this->hasOne(Cliente::className(), ['id' => 'id_cliente']);
    }
}
