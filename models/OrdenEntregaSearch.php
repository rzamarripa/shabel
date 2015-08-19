<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\OrdenEntrega;

/**
 * OrdenEntregaSearch represents the model behind the search form about `app\models\OrdenEntrega`.
 */
class OrdenEntregaSearch extends OrdenEntrega
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'cliente_did', 'estatus_did'], 'integer'],
            [['contacto', 'folio', 'fecha_f', 'comentarios', 'fechacreacion_ft'], 'safe'],
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
        $query = OrdenEntrega::find();

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
            'cliente_did' => $this->cliente_did,
            'fecha_f' => $this->fecha_f,
            'estatus_did' => $this->estatus_did,
            'fechacreacion_ft' => $this->fechacreacion_ft,
        ]);

        $query->andFilterWhere(['like', 'contacto', $this->contacto])
            ->andFilterWhere(['like', 'folio', $this->folio])
            ->andFilterWhere(['like', 'comentarios', $this->comentarios]);

        return $dataProvider;
    }
}
