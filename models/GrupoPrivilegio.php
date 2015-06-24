<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "grupo_privilegio".
 *
 * @property integer $Id_Grupo
 * @property integer $Id_Privilegio
 *
 * @property Grupo $idGrupo
 * @property Privilegio $idPrivilegio
 */
class GrupoPrivilegio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'grupo_privilegio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Id_Grupo', 'Id_Privilegio'], 'required'],
            [['Id_Grupo', 'Id_Privilegio'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Id_Grupo' => 'Id  Grupo',
            'Id_Privilegio' => 'Id  Privilegio',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdGrupo()
    {
        return $this->hasOne(Grupo::className(), ['Id' => 'Id_Grupo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPrivilegio()
    {
        return $this->hasOne(Privilegio::className(), ['Id' => 'Id_Privilegio']);
    }
}
