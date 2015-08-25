<?php

namespace app\models;

use Yii;


class Articulo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'articulo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['estatus_did'], 'required'],
            [['estatus_did'], 'integer'],
            [['fechacreacion_ft'], 'safe'],
            [['nombre'], 'string', 'max' => 200],
            [['unidad'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'unidad' => 'Unidad',
            'estatus_did' => 'Estatus Did',
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
    public function getDetallecotizacions()
    {
        return $this->hasMany(Detallecotizacion::className(), ['articulo_aid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetalleordencompras()
    {
        return $this->hasMany(Detalleordencompra::className(), ['articulo_aid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetalleordenentregas()
    {
        return $this->hasMany(Detalleordenentrega::className(), ['articulo_aid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetallerequisicions()
    {
        return $this->hasMany(Detallerequisicion::className(), ['articulo_aid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetallesolicituds()
    {
        return $this->hasMany(Detallesolicitud::className(), ['articulo_aid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInventarios()
    {
        return $this->hasMany(Inventario::className(), ['articulos_aid' => 'id']);
    }
}
