<?php

use yii\db\Migration;

class m220714_095825_create_table_exported_capital extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%exported_capital}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'value' => $this->decimal(12, 2)->notNull()->comment('Amount value'),
                'oversea_investment_id' => $this->integer()->notNull()->comment('Oversea investment ID is foreign keys from relation table Oversea investment'),
            ],
            $tableOptions
        );

        $this->createIndex('fk_exported_capital_oversea_investment1_idx', '{{%exported_capital}}', ['oversea_investment_id']);

        $this->addForeignKey(
            'fk_exported_capital_oversea_investment1',
            '{{%exported_capital}}',
            ['oversea_investment_id'],
            '{{%oversea_investment}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%exported_capital}}');
    }
}
