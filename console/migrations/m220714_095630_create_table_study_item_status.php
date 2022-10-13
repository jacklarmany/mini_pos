<?php

use yii\db\Migration;

class m220714_095630_create_table_study_item_status extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%study_item_status}}',
            [
                'id' => $this->primaryKey()->unsigned()->comment('Primary key of table is auto increment'),
                'status' => $this->string(45)->notNull()->comment('Name'),
            ],
            $tableOptions
        );

        $this->createIndex('status_UNIQUE', '{{%study_item_status}}', ['status'], true);
    }

    public function safeDown()
    {
        $this->dropTable('{{%study_item_status}}');
    }
}
