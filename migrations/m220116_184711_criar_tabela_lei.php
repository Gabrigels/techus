<?php

use yii\db\cubrid\Schema;
use yii\db\Migration;

/**
 * Class m220116_184711_criar_tabela_lei
 */
class m220116_184711_criar_tabela_lei extends Migration
{
    public function up()
    {
        $this->createTable('lei', [
            'id' => 'pk',
            'codigo' => Schema::TYPE_STRING . ' NOT NULL',
            'descricao' => Schema::TYPE_TEXT . ' NOT NULL',
            'cidade' => Schema::TYPE_STRING . ' NOT NULL',
            'estado' => Schema::TYPE_STRING . ' NOT NULL',
            'pais' => Schema::TYPE_STRING . ' NOT NULL',
            'enquadramento' => Schema::TYPE_STRING . ' NOT NULL',
        ]);
    }

    public function down()
    {
        $this->dropTable('lei');
    }
}
