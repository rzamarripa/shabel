<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "requisicion".
 *
 * @property string $id
 * @property string $folio
 * @property string $fecha_f
 * @property string $cliente_did
 * @property string $departamento
 * @property string $comentarios
 * @property string $estatus_did
 * @property string $usuario_aid
 * @property string $fechacreacion_ft
 *
 * @property Cotizacion[] $cotizacions
 * @property Detallerequisicion[] $detallerequisicions
 * @property Ordencompra[] $ordencompras
 * @property Cliente $clienteD
 * @property Estatus $estatusD
 * @property Usuarios $usuarioA
 * @property Solicitud[] $solicituds
 */
class Requisicion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'requisicion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fecha_f', 'fechacreacion_ft'], 'safe'],
            [['cliente_did', 'estatus_did', 'usuario_aid'], 'integer'],
            [['comentarios'], 'string'],
            [['folio'], 'string', 'max' => 20],
            [['departamento'], 'string', 'max' => 100]
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
            'cliente_did' => 'Cliente Did',
            'departamento' => 'Departamento',
            'comentarios' => 'Comentarios',
            'estatus_did' => 'Estatus Did',
            'usuario_aid' => 'Usuario Aid',
            'fechacreacion_ft' => 'Fechacreacion Ft',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCotizacion()
    {
        return $this->hasMany(Cotizacion::className(), ['requisicion_did' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetallerequisicion()
    {
        return $this->hasMany(Detallerequisicion::className(), ['requisicion_did' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrdencompra()
    {
        return $this->hasMany(Ordencompra::className(), ['requisicion_did' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCliente()
    {
        return $this->hasOne(Cliente::className(), ['id' => 'cliente_did']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstatus()
    {
        return $this->hasOne(Estatus::className(), ['id' => 'estatus_did']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuario()
    {
        return $this->hasOne(Usuarios::className(), ['id' => 'usuario_aid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSolicitud()
    {
        return $this->hasMany(Solicitud::className(), ['requisicion_did' => 'id']);
    }
}
