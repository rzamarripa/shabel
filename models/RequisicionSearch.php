<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Requisicion;

/**
 * RequisicionSearch represents the model behind the search form about `app\models\Requisicion`.
 */
class RequisicionSearch extends Requisicion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'cliente_did', 'estatus_did', 'usuario_aid'], 'integer'],
            [['folio', 'fecha_f', 'departamento', 'comentarios', 'fechacreacion_ft'], 'safe'],
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
        $query = Requisicion::find();

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
            'fecha_f' => $this->fecha_f,
            'cliente_did' => $this->cliente_did,
            'estatus_did' => $this->estatus_did,
            'usuario_aid' => $this->usuario_aid,
            'fechacreacion_ft' => $this->fechacreacion_ft,
        ]);

        $query->andFilterWhere(['like', 'folio', $this->folio])
            ->andFilterWhere(['like', 'departamento', $this->departamento])
            ->andFilterWhere(['like', 'comentarios', $this->comentarios]);

        return $dataProvider;
    }
}
