<?php

use yii\db\Migration;

class m220107_075009_create_table_collateral extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%collateral}}',
            [
                'id' => $this->primaryKey()->comment('ລະຫັດ'),
                'project_id' => $this->integer()->notNull(),
                'number' => $this->integer()->notNull(),
                'date' => $this->dateTime()->notNull(),
                'amount' => $this->decimal(12, 2)->notNull(),
                'status' => $this->string()->notNull(),
                'currency_id' => $this->integer()->notNull(),
            ],
            $tableOptions
        );

        $this->createIndex('fk_collateral_currency1_idx', '{{%collateral}}', ['currency_id']);
        $this->createIndex('project_id', '{{%collateral}}', ['project_id']);

        $this->addForeignKey(
            'collateral_ibfk_1',
            '{{%collateral}}',
            ['project_id'],
            '{{%project}}',
            ['id'],
            'NO ACTION',
            'NO ACTION'
        );
        $this->addForeignKey(
            'fk_collateral_currency1',
            '{{%collateral}}',
            ['currency_id'],
            '{{%currency}}',
            ['id'],
            'NO ACTION',
            'NO ACTION'
        );
    }

    public function down()
    {
        $this->dropTable('{{%collateral}}');
    }
}
