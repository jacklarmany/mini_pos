<?php

use yii\db\Migration;

class m220107_074715_create_table_contribution extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%contribution}}',
            [
                'id' => $this->primaryKey(),
                'project_id' => $this->integer()->notNull(),
                'contribution_type_id' => $this->integer()->notNull(),
                'amount' => $this->decimal(12, 2)->notNull(),
                'currency_id' => $this->integer()->notNull(),
            ],
            $tableOptions
        );

        $this->createIndex('contribution_type_id', '{{%contribution}}', ['contribution_type_id']);
        $this->createIndex('fk_contribution_currency1_idx', '{{%contribution}}', ['currency_id']);
        $this->createIndex('project_id', '{{%contribution}}', ['project_id']);

        $this->addForeignKey(
            'contribution_ibfk_1',
            '{{%contribution}}',
            ['project_id'],
            '{{%project}}',
            ['id'],
            'NO ACTION',
            'NO ACTION'
        );
        $this->addForeignKey(
            'contribution_ibfk_2',
            '{{%contribution}}',
            ['contribution_type_id'],
            '{{%contribution_type}}',
            ['id'],
            'NO ACTION',
            'NO ACTION'
        );
        $this->addForeignKey(
            'fk_contribution_currency1',
            '{{%contribution}}',
            ['currency_id'],
            '{{%currency}}',
            ['id'],
            'NO ACTION',
            'NO ACTION'
        );
    }

    public function down()
    {
        $this->dropTable('{{%contribution}}');
    }
}
