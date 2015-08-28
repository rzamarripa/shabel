<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "requisicionproveedor".
 *
 * @property string $id
 * @property string $requisicion_did
 * @property string $proveedor_did
 *
 * @property Requisicion $requisicionD
 */
class Requisicionproveedor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'requisicionproveedor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['requisicion_did', 'proveedor_did'], 'integer']
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
            'proveedor_did' => 'Proveedor Did',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRequisicionD()
    {
        return $this->hasOne(Requisicion::className(), ['id' => 'requisicion_did']);
    }
}
