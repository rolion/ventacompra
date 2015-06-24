<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cliente".
 *
 * @property integer $id
 * @property string $nombre
 * @property string $apellido
 * @property integer $ci
 * @property integer $Eliminado
 *
 * @property NotaServicio[] $notaServicios
 * @property NotaVenta[] $notaVentas
 */
class Cliente extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cliente';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['ci', 'Eliminado'], 'integer'],
            [['nombre', 'apellido'], 'string', 'max' => 50]
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
            'apellido' => 'Apellido',
            'ci' => 'Ci',
            'Eliminado' => 'Eliminado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNotaServicios()
    {
        return $this->hasMany(NotaServicio::className(), ['id_cliente' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNotaVentas()
    {
        return $this->hasMany(NotaVenta::className(), ['id_cliente' => 'id']);
    }
}
