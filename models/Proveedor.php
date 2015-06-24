<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "proveedor".
 *
 * @property integer $id
 * @property string $nombre
 * @property integer $nit
 * @property string $telefono
 * @property string $direccion
 *
 * @property NotaCompra[] $notaCompras
 */
class Proveedor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'proveedor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'nit'], 'required'],
            [['nit'], 'integer'],
            [['nombre'], 'string', 'max' => 30],
            [['telefono'], 'string', 'max' => 10],
            [['direccion'], 'string', 'max' => 50]
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
            'nit' => 'Nit',
            'telefono' => 'Telefono',
            'direccion' => 'Direccion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNotaCompras()
    {
        return $this->hasMany(NotaCompra::className(), ['id_proveedor' => 'id']);
    }
}
