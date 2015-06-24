<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "grupo".
 *
 * @property integer $Id
 * @property string $Nombre
 * @property integer $Eliminado
 *
 * @property GrupoPrivilegio[] $grupoPrivilegios
 * @property Privilegio[] $idPrivilegios
 * @property Usuario[] $usuarios
 */
class Grupo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'grupo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Nombre'], 'required'],
            [['Eliminado'], 'integer'],
            [['Nombre'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'Nombre' => 'Nombre',
            'Eliminado' => 'Eliminado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGrupoPrivilegios()
    {
        return $this->hasMany(GrupoPrivilegio::className(), ['Id_Grupo' => 'Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPrivilegios()
    {
        return $this->hasMany(Privilegio::className(), ['Id' => 'Id_Privilegio'])->viaTable('grupo_privilegio', ['Id_Grupo' => 'Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarios()
    {
        return $this->hasMany(Usuario::className(), ['Id_Grupo' => 'Id']);
    }
}
