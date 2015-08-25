<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ordenentrega".
 *
 * @property string $id
 * @property string $cliente_did
 * @property string $contacto
 * @property string $folio
 * @property string $fecha_f
 * @property string $comentarios
 * @property string $estatus_did
 * @property string $fechacreacion_ft
 *
 * @property Detalleordenentrega[] $detalleordenentregas
 * @property Cliente $clienteD
 * @property Estatus $estatusD
 */
class OrdenEntrega extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ordenentrega';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cliente_did', 'fecha_f', 'estatus_did'], 'required'],
            [['cliente_did', 'estatus_did'], 'integer'],
            [['fecha_f', 'fechacreacion_ft'], 'safe'],
            [['comentarios'], 'string'],
            [['contacto'], 'string', 'max' => 100],
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
            'cliente_did' => 'Cliente Did',
            'contacto' => 'Contacto',
            'folio' => 'Folio',
            'fecha_f' => 'Fecha F',
            'comentarios' => 'Comentarios',
            'estatus_did' => 'Estatus Did',
            'fechacreacion_ft' => 'Fechacreacion Ft',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetalleordenentregas()
    {
        return $this->hasMany(Detalleordenentrega::className(), ['ordenentrega_did' => 'id']);
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
}
