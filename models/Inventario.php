<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "inventario".
 *
 * @property string $id
 * @property integer $cantidad
 * @property string $articulos_aid
 * @property string $estatus_did
 * @property string $fechacreacion_ft
 *
 * @property Articulo $articulosA
 * @property Estatus $estatusD
 */
class Inventario extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inventario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cantidad', 'articulos_aid', 'estatus_did'], 'integer'],
            [['fechacreacion_ft'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cantidad' => 'Cantidad',
            'articulos_aid' => 'Articulos Aid',
            'estatus_did' => 'Estatus Did',
            'fechacreacion_ft' => 'Fechacreacion Ft',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticulosA()
    {
        return $this->hasOne(Articulo::className(), ['id' => 'articulos_aid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstatusD()
    {
        return $this->hasOne(Estatus::className(), ['id' => 'estatus_did']);
    }
}
