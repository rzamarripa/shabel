<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "proveedor".
 *
 * @property string $id
 * @property string $nombre
 * @property string $direccion
 * @property string $contacto
 * @property string $telefono
 * @property string $telefono1
 * @property string $correo
 * @property string $estatus_did
 * @property string $fechaCreacion_ft
 *
 * @property Estatus $estatusD
 * @property Solicitud[] $solicituds
 */
class Proveedor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'proveedor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['direccion'], 'string'],
            [['estatus_did'], 'required'],
            [['estatus_did'], 'integer'],
            [['fechaCreacion_ft'], 'safe'],
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
            'fechaCreacion_ft' => 'Fecha Creacion Ft',
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
    public function getSolicituds()
    {
        return $this->hasMany(Solicitud::className(), ['proveedor_did' => 'id']);
    }
}
