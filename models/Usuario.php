<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "usuario".
 *
 * @property integer $Id_Grupo
 * @property integer $Id
 * @property string $username
 * @property string $password
 * @property integer $Id_Empleado
 * @property integer $Eliminado
 *
 * @property Empleado $idEmpleado
 * @property Grupo $idGrupo
 */
class Usuario extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'usuario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Id_Grupo', 'username', 'password', 'Id_Empleado'], 'required'],
            [['Id_Grupo', 'Id_Empleado', 'Eliminado'], 'integer'],
            [['username'], 'string', 'max' => 30],
            [['password'], 'string', 'max' => 15]
        ];
    }
       public function login(){
       return Usuario::findOne(['username'=>  $this->username,'password'=>  $this->password,'Eliminado'=>0]);
    }


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Id_Grupo' => 'Id  Grupo',
            'Id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'Id_Empleado' => 'Id  Empleado',
            'Eliminado' => 'Eliminado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEmpleado()
    {
        return $this->hasOne(Empleado::className(), ['Id' => 'Id_Empleado']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdGrupo()
    {
        return $this->hasOne(Grupo::className(), ['Id' => 'Id_Grupo']);
    }

    public function getAuthKey() {
        return $this->password;
    }

    public function getId() {
        $this->Id;
    }

    public function validateAuthKey($authKey) {
        return (strcmp($this->password,$authKey)==0)?true:false;
    }

    public static function findIdentity($id) {
        return Usuario::findOne(['Id'=> $id]);
    }

    public static function findIdentityByAccessToken($token, $type = null) {
        
    }

}
