<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "detalleordenentrega".
 *
 * @property string $id
 * @property integer $cantidad
 * @property string $articulo_aid
 * @property double $preciounitario
 * @property double $importe
 * @property double $porcentaje
 * @property string $ordenentrega_did
 * @property string $estatus_did
 * @property string $comentarios
 * @property string $fechacreacion_ft
 *
 * @property Ordenentrega $ordenentregaD
 * @property Estatus $estatusD
 * @property Articulo $articuloA
 */
class DetalleOrdenEntrega extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'detalleordenentrega';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cantidad', 'articulo_aid', 'preciounitario', 'importe', 'ordenentrega_did', 'estatus_did'], 'required'],
            [['cantidad', 'articulo_aid', 'ordenentrega_did', 'estatus_did'], 'integer'],
            [['preciounitario', 'importe', 'porcentaje'], 'number'],
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
            'preciounitario' => 'Preciounitario',
            'importe' => 'Importe',
            'porcentaje' => 'Porcentaje',
            'ordenentrega_did' => 'Ordenentrega Did',
            'estatus_did' => 'Estatus Did',
            'comentarios' => 'Comentarios',
            'fechacreacion_ft' => 'Fechacreacion Ft',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrdenentregaD()
    {
        return $this->hasOne(Ordenentrega::className(), ['id' => 'ordenentrega_did']);
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
}
