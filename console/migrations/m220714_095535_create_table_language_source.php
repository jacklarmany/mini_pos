<?php

use yii\db\Migration;

class m220714_095535_create_table_language_source extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%language_source}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'category' => $this->string(32)->comment('Category is type varible text in source code'),
                'message' => $this->text()->comment('Message is label  text in source code'),
            ],
            $tableOptions
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%language_source}}');
    }
}
