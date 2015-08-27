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
 * @property string $fechaCreacion_ft
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
            [['fecha_f', 'cliente_did', 'estatus_did', 'usuario_aid'], 'required'],
            [['fecha_f', 'fechaCreacion_ft'], 'safe'],
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
            'fecha_f' => 'Fecha',
            'cliente_did' => 'Cliente',
            'departamento' => 'Departamento',
            'comentarios' => 'Comentarios',
            'estatus_did' => 'Estatus',
            'usuario_aid' => 'Usuario',
            'fechacreacion_ft' => 'Fechacreacion',
        ];
    }
    
    public function to_array($include_detalle = false) {
		$data = array(
			'id' => $this->id,
			'folio' => $this->folio,
			'fecha' => $this->fecha_f,
			'cliente_did' => $this->cliente_did->to_array(),
			'comentarios' => $this->comentarios
		);

		if ($include_detalle) {
			$items = array();
			foreach ($this->detalleRequisicion as $item) {
				$items[] = $item->to_array(array('articulo', 'unidad'));
			}
			$data['detalle'] = $items;
		}
		return $data;
	}

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCotizacions()
    {
        return $this->hasMany(Cotizacion::className(), ['requisicion_did' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetallerequisicions()
    {
        return $this->hasMany(Detallerequisicion::className(), ['requisicion_did' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrdencompras()
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
    public function getEstatusD()
    {
        return $this->hasOne(Estatus::className(), ['id' => 'estatus_did']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarioA()
    {
        return $this->hasOne(Usuarios::className(), ['id' => 'usuario_aid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSolicituds()
    {
        return $this->hasMany(Solicitud::className(), ['requisicion_did' => 'id']);
    }
}
