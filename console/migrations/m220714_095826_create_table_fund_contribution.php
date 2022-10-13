<?php

use yii\db\Migration;

class m220714_095826_create_table_fund_contribution extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%fund_contribution}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'project_id' => $this->integer()->notNull()->comment('Project ID is foreign keys from relation table project'),
                'fund_id' => $this->integer()->notNull()->comment('Fund ID is Foreign keys form relation table fund'),
                'amount' => $this->decimal(10, 2)->notNull()->comment('Amount fund contribution'),
                'currency_id' => $this->integer()->notNull()->comment('Currency ID is foreign key from relation table currency'),
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
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'fund_contribution_ibfk_2',
            '{{%fund_contribution}}',
            ['fund_id'],
            '{{%fund}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%fund_contribution}}');
    }
}
