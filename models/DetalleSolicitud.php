<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "detallesolicitud".
 *
 * @property string $id
 * @property integer $cantidad
 * @property string $articulo_aid
 * @property string $solicitud_did
 * @property string $estatus_did
 * @property string $comentarios
 * @property string $fechacreacion_ft
 *
 * @property Articulo $articuloA
 * @property Estatus $estatusD
 * @property Solicitud $solicitudD
 */
class DetalleSolicitud extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'detallesolicitud';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cantidad', 'articulo_aid', 'solicitud_did', 'estatus_did'], 'required'],
            [['cantidad', 'articulo_aid', 'solicitud_did', 'estatus_did'], 'integer'],
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
            'solicitud_did' => 'Solicitud Did',
            'estatus_did' => 'Estatus Did',
            'comentarios' => 'Comentarios',
            'fechacreacion_ft' => 'Fechacreacion Ft',
        ];
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
    public function getEstatusD()
    {
        return $this->hasOne(Estatus::className(), ['id' => 'estatus_did']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSolicitudD()
    {
        return $this->hasOne(Solicitud::className(), ['id' => 'solicitud_did']);
    }
}
