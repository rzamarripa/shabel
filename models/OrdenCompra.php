<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ordencompra".
 *
 * @property string $id
 * @property string $folio
 * @property string $requisicion_did
 * @property string $codicionpago
 * @property string $estatus_did
 * @property string $fechaCreacion_ft
 *
 * @property Detalleordencompra[] $detalleordencompras
 * @property Estatus $estatusD
 * @property Requisicion $requisicionD
 */
class OrdenCompra extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ordencompra';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['requisicion_did', 'estatus_did'], 'required'],
            [['requisicion_did', 'estatus_did'], 'integer'],
            [['fechaCreacion_ft'], 'safe'],
            [['folio', 'codicionpago'], 'string', 'max' => 20]
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
            'requisicion_did' => 'Requisicion Did',
            'codicionpago' => 'Codicionpago',
            'estatus_did' => 'Estatus Did',
            'fechaCreacion_ft' => 'Fecha Creacion Ft',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetalleordencompras()
    {
        return $this->hasMany(Detalleordencompra::className(), ['ordencompra_did' => 'id']);
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
}
