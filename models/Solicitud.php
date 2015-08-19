<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "solicitud".
 *
 * @property string $id
 * @property string $requisicion_did
 * @property string $proveedor_did
 * @property string $fecha_f
 * @property string $fechacreacion_ft
 *
 * @property Detallesolicitud[] $detallesolicituds
 * @property Proveedor $proveedorD
 * @property Requisicion $requisicionD
 */
class Solicitud extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'solicitud';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['requisicion_did', 'proveedor_did'], 'integer'],
            [['fecha_f', 'fechacreacion_ft'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'requisicion_did' => 'Requisicion Did',
            'proveedor_did' => 'Proveedor Did',
            'fecha_f' => 'Fecha F',
            'fechacreacion_ft' => 'Fechacreacion Ft',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetallesolicituds()
    {
        return $this->hasMany(Detallesolicitud::className(), ['solicitud_did' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProveedorD()
    {
        return $this->hasOne(Proveedor::className(), ['id' => 'proveedor_did']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRequisicionD()
    {
        return $this->hasOne(Requisicion::className(), ['id' => 'requisicion_did']);
    }
}
