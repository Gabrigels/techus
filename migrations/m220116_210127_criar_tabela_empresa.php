<?php

use yii\db\cubrid\Schema;
use yii\db\Migration;

/**
 * Class m220116_210127_criar_tabela_empresa
 */
class m220116_210127_criar_tabela_empresa extends Migration
{
    public function up()
    {
        $this->createTable('empresa', [
            'id' => 'pk',
            'nome' => $this->string(100)->notNull(),
            'cnpj' => $this->string(14)->notNull(),
            'cep' => $this->string(9)->notNull(),
            'endereco' => $this->string(100)->notNull(),
            'cidade' => $this->string(100)->notNull(),
            'estado' => $this->string(2)->notNull(),
            'pais' => $this->string(100)->notNull(),
        ]);
    }

    public function down()
    {
        $this->dropTable('empresa');
    }
}
