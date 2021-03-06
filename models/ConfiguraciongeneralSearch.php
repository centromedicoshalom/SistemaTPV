<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Configuraciongeneral;

/**
 * ConfiguraciongeneralSearch represents the model behind the search form of `app\models\Configuraciongeneral`.
 */
class ConfiguraciongeneralSearch extends Configuraciongeneral
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IdConfiguracionGeneral'], 'integer'],
            [['IpServidora', 'NombreCarpeta', 'UnidadServer'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Configuraciongeneral::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'IdConfiguracionGeneral' => $this->IdConfiguracionGeneral,
        ]);

        $query->andFilterWhere(['like', 'IpServidora', $this->IpServidora])
            ->andFilterWhere(['like', 'NombreCarpeta', $this->NombreCarpeta])
            ->andFilterWhere(['like', 'UnidadServer', $this->UnidadServer]);

        return $dataProvider;
    }
}
