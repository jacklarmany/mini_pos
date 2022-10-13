<?php

use yii\db\Migration;

class m220714_095520_create_table_delay_reason extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%delay_reason}}',
            [
                'id' => $this->primaryKey()->unsigned()->comment('Primary key of table is auto increment'),
                'reason' => $this->string(200)->notNull()->comment('Reason name'),
                'sort' => $this->integer()->notNull()->defaultValue('100')->comment('Sort sequences'),
            ],
            $tableOptions
        );

        $this->createIndex('reason_UNIQUE', '{{%delay_reason}}', ['reason'], true);
    }

    public function safeDown()
    {
        $this->dropTable('{{%delay_reason}}');
    }
}
