<?php

use yii\db\cubrid\Schema;
use yii\db\Migration;

/**
 * Class m220116_205205_criar_tabela_auditor
 */
class m220116_205205_criar_tabela_auditor extends Migration
{
    public function up()
    {
        $this->createTable('auditor', [
            'id' => 'pk',
            'nome' => Schema::TYPE_STRING . ' NOT NULL',
        ]);
    }

    public function down()
    {
        $this->dropTable('auditor');
    }
}
