<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lei".
 *
 * @property int $id
 * @property string $codigo
 * @property string $descricao
 * @property string $cidade
 * @property string $estado
 * @property string $pais
 * @property string $enquadramento
 *
 * @property Auditoria[] $auditorias
 */
class Lei extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lei';
    }

    public static $ENQUADRAMENTO = [
        'Municipal' => 'Municipal',
        'Estadual' => 'Estadual',
        'Nacional' => 'Nacional',
        'Internacional' => 'Internacional',
    ];

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['codigo', 'descricao', 'cidade', 'estado', 'pais', 'enquadramento'], 'required'],
            [['descricao'], 'string'],
            [['codigo', 'cidade', 'estado', 'pais', 'enquadramento'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Id Lei',
            'codigo' => 'Codigo',
            'descricao' => 'Descricao',
            'cidade' => 'Cidade',
            'estado' => 'Estado',
            'pais' => 'Pais',
            'enquadramento' => 'Enquadramento',
        ];
    }

    /**
     * Gets query for [[Auditorias]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAuditorias()
    {
        return $this->hasMany(Auditoria::className(), ['id' => 'id']);
    }
}
