<?php

use yii\db\Migration;

/**
 * Class m220116_213358_criar_tabela_auditoria
 */
class m220116_213358_criar_tabela_auditoria extends Migration
{
    public function up()
    {
        $this->createTable('auditoria', [
            'id' => 'pk',
            'descricao' => $this->string()->notNull(),
            'id_auditor' => $this->integer()->notNull(),
            'id_empresa' => $this->integer()->notNull(),
            'id_lei' => $this->integer()->notNull(),
        ]);

        $this->createIndex('idx-auditoria-id_auditor', 'auditoria', 'id_auditor');
        $this->createIndex('idx-auditoria-id_empresa', 'auditoria', 'id_empresa');
        $this->createIndex('idx-auditoria-id_lei', 'auditoria', 'id_lei');

        $this->addForeignKey('fk-auditoria-id_auditor', 'auditoria', 'id_auditor', 'auditor', 'id', 'CASCADE');
        $this->addForeignKey('fk-auditoria-id_empresa', 'auditoria', 'id_empresa', 'empresa', 'id', 'CASCADE');
        $this->addForeignKey('fk-auditoria-id_lei', 'auditoria', 'id_lei', 'lei', 'id', 'CASCADE');
    }

    public function down()
    {
        $this->dropForeignKey(
            'fk-auditoria-id_auditor',
            'auditoria'
        );

        $this->dropForeignKey(
            'fk-auditoria-id_empresa',
            'auditoria'
        );

        $this->dropForeignKey(
            'fk-auditoria-id_lei',
            'auditoria'
        );

        $this->dropIndex(
            'idx-auditoria-id_auditor',
            'auditoria'
        );

        $this->dropIndex(
            'idx-auditoria-id_empresa',
            'auditoria'
        );

        $this->dropIndex(
            'idx-auditoria-id_lei',
            'auditoria'
        );

        $this->dropTable('auditoria');
    }
}
