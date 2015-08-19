<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cotizacion".
 *
 * @property string $id
 * @property string $folio
 * @property string $fecha_f
 * @property double $porcentaje
 * @property double $subtotal
 * @property double $iva
 * @property double $total
 * @property string $estatus_did
 * @property string $requisicion_did
 * @property string $cliente_did
 * @property string $comentarios
 * @property string $fechacreacion_ft
 *
 * @property Cliente $clienteD
 * @property Estatus $estatusD
 * @property Requisicion $requisicionD
 * @property Detallecotizacion[] $detallecotizacions
 */
class Cotizacion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cotizacion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fecha_f', 'fechacreacion_ft'], 'safe'],
            [['porcentaje', 'subtotal', 'iva', 'total'], 'number'],
            [['estatus_did', 'requisicion_did', 'cliente_did'], 'integer'],
            [['comentarios'], 'string'],
            [['folio'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'folio' => 'Folio',
            'fecha_f' => 'Fecha F',
            'porcentaje' => 'Porcentaje',
            'subtotal' => 'Subtotal',
            'iva' => 'Iva',
            'total' => 'Total',
            'estatus_did' => 'Estatus Did',
            'requisicion_did' => 'Requisicion Did',
            'cliente_did' => 'Cliente Did',
            'comentarios' => 'Comentarios',
            'fechacreacion_ft' => 'Fechacreacion Ft',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClienteD()
    {
        return $this->hasOne(Cliente::className(), ['id' => 'cliente_did']);
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
    public function getRequisicionD()
    {
        return $this->hasOne(Requisicion::className(), ['id' => 'requisicion_did']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetallecotizacions()
    {
        return $this->hasMany(Detallecotizacion::className(), ['cotizacion_did' => 'id']);
    }
}
