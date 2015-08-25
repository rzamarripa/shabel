<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pago".
 *
 * @property string $id
 * @property string $requisicion_did
 * @property string $cotizacion_did
 * @property string $ordenentrega_did
 * @property double $importe
 * @property string $fechaCreacion_ft
 */
class Pago extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pago';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['requisicion_did', 'cotizacion_did', 'ordenentrega_did', 'importe'], 'required'],
            [['requisicion_did', 'cotizacion_did', 'ordenentrega_did'], 'integer'],
            [['importe'], 'number'],
            [['fechaCreacion_ft'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'requisicion_did' => 'Requisicion Did',
            'cotizacion_did' => 'Cotizacion Did',
            'ordenentrega_did' => 'Ordenentrega Did',
            'importe' => 'Importe',
            'fechaCreacion_ft' => 'Fecha Creacion Ft',
        ];
    }
}
