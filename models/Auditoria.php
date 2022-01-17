<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "auditoria".
 *
 * @property int $id
 * @property int $id_auditor
 * @property int $id_empresa
 * @property int $id_lei
 *
 * @property Auditor $auditor
 * @property Empresa $empresa
 * @property Lei $lei
 * @property Parecer[] $parecers
 */
class Auditoria extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'auditoria';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_auditor', 'id_empresa', 'id_lei'], 'required'],
            [['id_auditor', 'id_empresa', 'id_lei'], 'integer'],
            [['id_auditor'], 'exist', 'skipOnError' => true, 'targetClass' => Auditor::className(), 'targetAttribute' => ['id_auditor' => 'id']],
            [['id_empresa'], 'exist', 'skipOnError' => true, 'targetClass' => Empresa::className(), 'targetAttribute' => ['id_empresa' => 'id']],
            [['id_lei'], 'exist', 'skipOnError' => true, 'targetClass' => Lei::className(), 'targetAttribute' => ['id_lei' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_auditor' => 'Id Auditor',
            'id_empresa' => 'Id Empresa',
            'id_lei' => 'Id Lei',
        ];
    }

    /**
     * Gets query for [[Auditor]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAuditor()
    {
        return $this->hasOne(Auditor::className(), ['id' => 'id_auditor']);
    }

    /**
     * Gets query for [[Empresa]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEmpresa()
    {
        return $this->hasOne(Empresa::className(), ['id' => 'id_empresa']);
    }

    /**
     * Gets query for [[Lei]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLei()
    {
        return $this->hasOne(Lei::className(), ['id' => 'id_lei']);
    }

    /**
     * Gets query for [[Parecers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getParecers()
    {
        return $this->hasMany(Parecer::className(), ['id_auditoria' => 'id']);
    }
}
