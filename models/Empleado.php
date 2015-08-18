<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "empleados".
 *
 * @property integer $id
 * @property string $nombre
 * @property string $apellidos
 * @property string $celular
 * @property string $puesto
 * @property string $direccion
 * @property integer $estatus_did
 */
class Empleado extends \yii\db\ActiveRecord
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
            [['nombre', 'apellidos', 'puesto', 'estatus_did'], 'required'],
            [['nombre', 'apellidos', 'celular', 'puesto', 'direccion'], 'string'],
            [['estatus_did'], 'integer']
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
            'direccion' => 'Dirección',
            'estatus_did' => 'Estatus',
        ];
    }
}
