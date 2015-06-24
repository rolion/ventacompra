<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipo_empleado".
 *
 * @property integer $Id
 * @property string $Descripcion
 * @property integer $Eliminado
 *
 * @property Empleado[] $empleados
 */
class TipoEmpleado extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipo_empleado';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Descripcion'], 'required'],
            [['Eliminado'], 'integer'],
            [['Descripcion'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'Descripcion' => 'Descripcion',
            'Eliminado' => 'Eliminado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpleados()
    {
        return $this->hasMany(Empleado::className(), ['Id_Tipo_Empleado' => 'Id']);
    }
}
