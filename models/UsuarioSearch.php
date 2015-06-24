<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Usuario;

/**
 * UsuarioSearch represents the model behind the search form about `app\models\Usuario`.
 */
class UsuarioSearch extends Usuario
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Id_Grupo', 'Id', 'Id_Empleado', 'Eliminado'], 'integer'],
            [['Cuenta', 'Contrasena'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Usuario::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'Id_Grupo' => $this->Id_Grupo,
            'Id' => $this->Id,
            'Id_Empleado' => $this->Id_Empleado,
            'Eliminado' => $this->Eliminado,
        ]);

        $query->andFilterWhere(['like', 'Cuenta', $this->Cuenta])
            ->andFilterWhere(['like', 'Contrasena', $this->Contrasena]);

        return $dataProvider;
    }
}
