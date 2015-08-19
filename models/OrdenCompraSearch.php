<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\OrdenCompra;

/**
 * OrdenCompraSearch represents the model behind the search form about `app\models\OrdenCompra`.
 */
class OrdenCompraSearch extends OrdenCompra
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'requisicion_did', 'estatus_did'], 'integer'],
            [['folio', 'codicionpago', 'fechaCreacion_ft'], 'safe'],
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
        $query = OrdenCompra::find();

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
            'requisicion_did' => $this->requisicion_did,
            'estatus_did' => $this->estatus_did,
            'fechaCreacion_ft' => $this->fechaCreacion_ft,
        ]);

        $query->andFilterWhere(['like', 'folio', $this->folio])
            ->andFilterWhere(['like', 'codicionpago', $this->codicionpago]);

        return $dataProvider;
    }
}
