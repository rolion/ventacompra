<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "estado_cuota".
 *
 * @property integer $id
 * @property string $descripcion
 *
 * @property Cuota[] $cuotas
 */
class EstadoCuota extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'estado_cuota';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descripcion'], 'required'],
            [['descripcion'], 'string', 'max' => 50]
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCuotas()
    {
        return $this->hasMany(Cuota::className(), ['id_estado_cuota' => 'id']);
    }
}
