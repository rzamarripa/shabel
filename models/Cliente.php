<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cliente".
 *
 * @property string $id
 * @property string $nombre
 * @property string $direccion
 * @property string $contacto
 * @property string $telefono
 * @property string $telefono1
 * @property string $correo
 * @property string $estatus_did
 * @property string $fechacreacion_ft
 *
 * @property Estatus $estatusD
 * @property Cotizacion[] $cotizacions
 * @property Ordenentrega[] $ordenentregas
 * @property Requisicion[] $requisicions
 */
class Cliente extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cliente';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['direccion'], 'string'],
            [['estatus_did'], 'integer'],
            [['fechacreacion_ft'], 'safe'],
            [['nombre', 'contacto'], 'string', 'max' => 100],
            [['telefono', 'telefono1'], 'string', 'max' => 12],
            [['correo'], 'string', 'max' => 50]
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
            'direccion' => 'Direccion',
            'contacto' => 'Contacto',
            'telefono' => 'Telefono',
            'telefono1' => 'Telefono1',
            'correo' => 'Correo',
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
    public function getCotizacions()
    {
        return $this->hasMany(Cotizacion::className(), ['cliente_did' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrdenentregas()
    {
        return $this->hasMany(Ordenentrega::className(), ['cliente_did' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRequisicions()
    {
        return $this->hasMany(Requisicion::className(), ['cliente_did' => 'id']);
    }
}
