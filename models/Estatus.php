<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "estatus".
 *
 * @property integer $id
 * @property string $nombre
 *
 * @property Empleados[] $empleados
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
            [['nombre'], 'required'],
            [['nombre'], 'string']
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpleados()
    {
        return $this->hasMany(Empleados::className(), ['estatus_did' => 'id']);
    }
}
