<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "privilegio".
 *
 * @property integer $Id
 * @property string $Descripcion
 *
 * @property GrupoPrivilegio[] $grupoPrivilegios
 * @property Grupo[] $idGrupos
 */
class Privilegio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'privilegio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Descripcion'], 'required'],
            [['Descripcion'], 'string', 'max' => 30]
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGrupoPrivilegios()
    {
        return $this->hasMany(GrupoPrivilegio::className(), ['Id_Privilegio' => 'Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdGrupos()
    {
        return $this->hasMany(Grupo::className(), ['Id' => 'Id_Grupo'])->viaTable('grupo_privilegio', ['Id_Privilegio' => 'Id']);
    }
}
