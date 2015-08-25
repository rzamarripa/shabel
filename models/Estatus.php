<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "estatus".
 *
 * @property string $id
 * @property string $nombre
 * @property string $requisicion
 * @property string $cotizacion
 *
 * @property Articulo[] $articulos
 * @property Cliente[] $clientes
 * @property Cotizacion[] $cotizacions
 * @property Detallecotizacion[] $detallecotizacions
 * @property Detalleordencompra[] $detalleordencompras
 * @property Detalleordenentrega[] $detalleordenentregas
 * @property Detallerequisicion[] $detallerequisicions
 * @property Detallesolicitud[] $detallesolicituds
 * @property Empleados[] $empleados
 * @property Inventario[] $inventarios
 * @property Ordencompra[] $ordencompras
 * @property Ordenentrega[] $ordenentregas
 * @property Proveedor[] $proveedors
 * @property Requisicion[] $requisicions
 * @property Tipousuario[] $tipousuarios
 * @property Usuarios[] $usuarios
 */
class Estatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'estatus';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'requisicion', 'cotizacion'], 'string', 'max' => 20]
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
            'requisicion' => 'Requisicion',
            'cotizacion' => 'Cotizacion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticulos()
    {
        return $this->hasMany(Articulo::className(), ['estatus_did' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClientes()
    {
        return $this->hasMany(Cliente::className(), ['estatus_did' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCotizacions()
    {
        return $this->hasMany(Cotizacion::className(), ['estatus_did' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetallecotizacions()
    {
        return $this->hasMany(Detallecotizacion::className(), ['estatus_did' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetalleordencompras()
    {
        return $this->hasMany(Detalleordencompra::className(), ['estatus_did' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetalleordenentregas()
    {
        return $this->hasMany(Detalleordenentrega::className(), ['estatus_did' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetallerequisicions()
    {
        return $this->hasMany(Detallerequisicion::className(), ['estatus_did' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetallesolicituds()
    {
        return $this->hasMany(Detallesolicitud::className(), ['estatus_did' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpleados()
    {
        return $this->hasMany(Empleados::className(), ['estatus_did' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInventarios()
    {
        return $this->hasMany(Inventario::className(), ['estatus_did' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrdencompras()
    {
        return $this->hasMany(Ordencompra::className(), ['estatus_did' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrdenentregas()
    {
        return $this->hasMany(Ordenentrega::className(), ['estatus_did' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProveedors()
    {
        return $this->hasMany(Proveedor::className(), ['estatus_did' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRequisicions()
    {
        return $this->hasMany(Requisicion::className(), ['estatus_did' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipousuarios()
    {
        return $this->hasMany(Tipousuario::className(), ['estatus_did' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarios()
    {
        return $this->hasMany(Usuarios::className(), ['estatus_did' => 'id']);
    }
}
