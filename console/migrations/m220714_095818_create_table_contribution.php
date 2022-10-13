<?php

use yii\db\Migration;

class m220714_095818_create_table_contribution extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%contribution}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'project_id' => $this->integer()->notNull()->comment('Project ID is foreign key from relation table project'),
                'contribution_type_id' => $this->integer()->notNull()->comment('Contribution type id is foreign keys from table contribution type'),
                'amount' => $this->decimal(12, 2)->notNull()->comment('Amount of contribution'),
                'currency_id' => $this->integer()->notNull()->comment('Currency ID is foreign keys from relation table currency'),
            ],
            $tableOptions
        );

        $this->createIndex('contribution_type_id', '{{%contribution}}', ['contribution_type_id']);
        $this->createIndex('fk_contribution_currency1_idx', '{{%contribution}}', ['currency_id']);
        $this->createIndex('project_id', '{{%contribution}}', ['project_id']);

        $this->addForeignKey(
            'contribution_ibfk_2',
            '{{%contribution}}',
            ['contribution_type_id'],
            '{{%contribution_type}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'fk_contribution_currency1',
            '{{%contribution}}',
            ['currency_id'],
            '{{%currency}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%contribution}}');
    }
}
