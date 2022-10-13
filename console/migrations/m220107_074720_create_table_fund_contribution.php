<?php

use yii\db\Migration;

class m220107_074720_create_table_fund_contribution extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%fund_contribution}}',
            [
                'id' => $this->primaryKey(),
                'project_id' => $this->integer()->notNull(),
                'fund_id' => $this->integer()->notNull(),
                'amount' => $this->decimal(10, 2)->notNull(),
                'currency_id' => $this->integer()->notNull(),
            ],
            $tableOptions
        );

        $this->createIndex('fk_fund_contribution_currency1_idx', '{{%fund_contribution}}', ['currency_id']);
        $this->createIndex('fund_id', '{{%fund_contribution}}', ['fund_id']);
        $this->createIndex('project_id', '{{%fund_contribution}}', ['project_id']);

        $this->addForeignKey(
            'fk_fund_contribution_currency1',
            '{{%fund_contribution}}',
            ['currency_id'],
            '{{%currency}}',
            ['id'],
            'NO ACTION',
            'NO ACTION'
        );
        $this->addForeignKey(
            'fund_contribution_ibfk_1',
            '{{%fund_contribution}}',
            ['project_id'],
            '{{%project}}',
            ['id'],
            'NO ACTION',
            'NO ACTION'
        );
        $this->addForeignKey(
            'fund_contribution_ibfk_2',
            '{{%fund_contribution}}',
            ['fund_id'],
            '{{%fund}}',
            ['id'],
            'NO ACTION',
            'NO ACTION'
        );
    }

    public function down()
    {
        $this->dropTable('{{%fund_contribution}}');
    }
}
