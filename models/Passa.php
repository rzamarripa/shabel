<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Passa".
 *
 * @property integer $id
 * @property integer $usuario_id
 * @property integer $empleado_aid
 * @property string $fecha_ft
 *
 * @property Empleados $empleadoA
 * @property Usuarios $usuario
 */
class Passa extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Passa';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['usuario_id', 'empleado_aid', 'fecha_ft'], 'required'],
            [['usuario_id', 'empleado_aid'], 'integer'],
            [['fecha_ft'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'usuario_id' => 'Usuario ID',
            'empleado_aid' => 'Empleado Aid',
            'fecha_ft' => 'Fecha Ft',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpleadoA()
    {
        return $this->hasOne(Empleados::className(), ['id' => 'empleado_aid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuario()
    {
        return $this->hasOne(Usuarios::className(), ['id' => 'usuario_id']);
    }
}
