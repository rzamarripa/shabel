<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "detalleordencompra".
 *
 * @property string $id
 * @property integer $cantidad
 * @property string $articulo_aid
 * @property string $comentarios
 * @property string $estatus_did
 * @property string $ordencompra_did
 * @property string $fechacreacion_ft
 *
 * @property Estatus $estatusD
 * @property Articulo $articuloA
 * @property Ordencompra $ordencompraD
 */
class DetalleOrdenCompra extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'detalleordencompra';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cantidad', 'articulo_aid', 'estatus_did', 'ordencompra_did'], 'required'],
            [['cantidad', 'articulo_aid', 'estatus_did', 'ordencompra_did'], 'integer'],
            [['comentarios'], 'string'],
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
            'articulo_aid' => 'Articulo Aid',
            'comentarios' => 'Comentarios',
            'estatus_did' => 'Estatus Did',
            'ordencompra_did' => 'Ordencompra Did',
            'fechacreacion_ft' => 'Fechacreacion Ft',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstatusD()
    {
        return $this->hasOne(Estatus::className(), ['id' => 'estatus_did']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticuloA()
    {
        return $this->hasOne(Articulo::className(), ['id' => 'articulo_aid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrdencompraD()
    {
        return $this->hasOne(Ordencompra::className(), ['id' => 'ordencompra_did']);
    }
}
