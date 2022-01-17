<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "empresa".
 *
 * @property int $id
 * @property string $nome
 * @property string $cnpj
 * @property string $cep
 * @property string $endereco
 * @property string $cidade
 * @property string $estado
 * @property string $pais
 *
 * @property Auditoria[] $auditorias
 */
class Empresa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'empresa';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'cnpj', 'cep', 'endereco', 'cidade', 'estado', 'pais'], 'required'],
            [['nome', 'endereco', 'cidade', 'pais'], 'string', 'max' => 100],
            [['cnpj'], 'string', 'max' => 14],
            [['cep'], 'string', 'max' => 9],
            [['estado'], 'string', 'max' => 2],
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
            'cnpj' => 'Cnpj',
            'cep' => 'Cep',
            'endereco' => 'Endereco',
            'cidade' => 'Cidade',
            'estado' => 'Estado',
            'pais' => 'Pais',
        ];
    }

    public function getRelLei() {
        return $this->hasMany(Lei::className(), 
                              ['cidade' => 'cidade', 
                               'estado' => 'estado',
                               'pais'   => 'pais']);
    }

    public function getRelLeiNome() {
        return $this->relLei->codigo;
    }


    /**
     * Gets query for [[Auditorias]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAuditorias()
    {
        return $this->hasMany(Auditoria::className(), ['id_empresa' => 'id']);
    }
}
