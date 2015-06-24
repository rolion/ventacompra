<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "servicio".
 *
 * @property integer $id
 * @property string $descripcion
 * @property string $precio
 * @property integer $Eliminado
 *
 * @property DetalleNotaServicio[] $detalleNotaServicios
 */
class Servicio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'servicio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descripcion', 'precio'], 'required'],
            [['precio'], 'number'],
            [['Eliminado'], 'integer'],
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
            'descripcion' => 'Descripcion',
            'precio' => 'Precio',
            'Eliminado' => 'Eliminado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetalleNotaServicios()
    {
        return $this->hasMany(DetalleNotaServicio::className(), ['id_servicio' => 'id']);
    }
}
