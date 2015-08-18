<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Empleado;

/**
 * EmpleadoSearch represents the model behind the search form about `app\models\Empleado`.
 */
class EmpleadoSearch extends Empleado
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'estatus_did'], 'integer'],
            [['nombre', 'apellidos', 'celular', 'puesto', 'direccion'], 'safe'],
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
        $query = Empleado::find();

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
            'id' => $this->id,
            'estatus_did' => $this->estatus_did,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'apellidos', $this->apellidos])
            ->andFilterWhere(['like', 'celular', $this->celular])
            ->andFilterWhere(['like', 'puesto', $this->puesto])
            ->andFilterWhere(['like', 'direccion', $this->direccion]);

        return $dataProvider;
    }
}
