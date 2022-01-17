<?php

use yii\db\Migration;

/**
 * Class m220116_214422_criar_tabela_parecer
 */
class m220116_214422_criar_tabela_parecer extends Migration
{
    public function up()
    {
        $this->createTable('parecer', [
            'id' => 'pk',
            'id_auditoria' => $this->integer()->notNull(),
            'descricao' => $this->string()->notNull(),
        ]);

        $this->createIndex('idx-parecer-id_auditoria', 'parecer', 'id_auditoria');

        $this->addForeignKey('fk-parecer-id_auditoria', 'parecer', 'id_auditoria', 'auditoria', 'id', 'CASCADE');
    }

    public function down()
    {
        $this->dropForeignKey(
            'fk-parecer-id_auditoria',
            'parecer'
        );


        $this->dropIndex(
            'idx-parecer-id_auditoria',
            'parecer'
        );


        $this->dropTable('parecer');
    }
}
