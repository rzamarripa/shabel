<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "empleados".
 *
 * @property string $id
 * @property string $nombre
 * @property string $apellidos
 * @property string $celular
 * @property string $puesto
 * @property string $direccion
 * @property string $estatus_did
 * @property string $fechaCreacion
 *
 * @property Estatus $estatusD
 * @property Usuarios[] $usuarios
 */
class Empleados extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'empleados';
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
            [['fechaCreacion'], 'safe'],
            [['nombre', 'apellidos', 'puesto'], 'string', 'max' => 100],
            [['celular'], 'string', 'max' => 20]
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
            'apellidos' => 'Apellidos',
            'celular' => 'Celular',
            'puesto' => 'Puesto',
            'direccion' => 'Direccion',
            'estatus_did' => 'Estatus Did',
            'fechaCreacion' => 'Fecha Creacion',
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
    public function getUsuarios()
    {
        return $this->hasMany(Usuarios::className(), ['empleado_did' => 'id']);
    }
}
