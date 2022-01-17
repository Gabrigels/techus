<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "auditor".
 *
 * @property int $id
 * @property string $nome
 *
 * @property Auditoria[] $auditorias
 */
class Auditor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'auditor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome'], 'required'],
            [['nome'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
        ];
    }

    /**
     * Gets query for [[Auditorias]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAuditorias()
    {
        return $this->hasMany(Auditoria::className(), ['id_auditor' => 'id']);
    }
}
