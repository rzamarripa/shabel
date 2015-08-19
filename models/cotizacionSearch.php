<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\cotizacion;

/**
 * cotizacionSearch represents the model behind the search form about `app\models\cotizacion`.
 */
class cotizacionSearch extends cotizacion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'estatus_did', 'requisicion_did', 'cliente_did'], 'integer'],
            [['folio', 'fecha_f', 'comentarios', 'fechacreacion_ft'], 'safe'],
            [['porcentaje', 'subtotal', 'iva', 'total'], 'number'],
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
        $query = cotizacion::find();

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
            'porcentaje' => $this->porcentaje,
            'subtotal' => $this->subtotal,
            'iva' => $this->iva,
            'total' => $this->total,
            'estatus_did' => $this->estatus_did,
            'requisicion_did' => $this->requisicion_did,
            'cliente_did' => $this->cliente_did,
            'fechacreacion_ft' => $this->fechacreacion_ft,
        ]);

        $query->andFilterWhere(['like', 'folio', $this->folio])
            ->andFilterWhere(['like', 'comentarios', $this->comentarios]);

        return $dataProvider;
    }
}
