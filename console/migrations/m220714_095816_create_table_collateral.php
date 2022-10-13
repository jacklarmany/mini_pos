<?php

use yii\db\Migration;

class m220714_095816_create_table_collateral extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%collateral}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'project_id' => $this->integer()->notNull()->comment('Project ID is foreign keys form relation table project'),
                'number' => $this->integer()->notNull()->comment('Is receipt number'),
                'date' => $this->dateTime()->notNull()->comment('Is date receipt'),
                'amount' => $this->decimal(12, 2)->notNull()->comment('Is amount'),
                'status' => $this->string()->notNull()->comment('Is status'),
                'currency_id' => $this->integer()->notNull()->comment('Currency ID is  foreign keys from relation table currency'),
            ],
            $tableOptions
        );

        $this->createIndex('fk_collateral_currency1_idx', '{{%collateral}}', ['currency_id']);
        $this->createIndex('project_id', '{{%collateral}}', ['project_id']);

        $this->addForeignKey(
            'fk_collateral_currency1',
            '{{%collateral}}',
            ['currency_id'],
            '{{%currency}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%collateral}}');
    }
}
