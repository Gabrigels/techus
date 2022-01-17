<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "parecer".
 *
 * @property int $id
 * @property int $id_auditoria
 * @property int $descricao
 *
 * @property Auditoria $auditoria
 */
class Parecer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'parecer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_auditoria', 'descricao'], 'required'],
            [['id_auditoria', 'descricao'], 'integer'],
            [['id_auditoria'], 'exist', 'skipOnError' => true, 'targetClass' => Auditoria::className(), 'targetAttribute' => ['id_auditoria' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_auditoria' => 'Id Auditoria',
            'descricao' => 'Descricao',
        ];
    }

    /**
     * Gets query for [[Auditoria]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAuditoria()
    {
        return $this->hasOne(Auditoria::className(), ['id' => 'id_auditoria']);
    }
}
