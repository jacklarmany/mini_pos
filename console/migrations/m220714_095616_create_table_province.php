<?php

use yii\db\Migration;

class m220714_095616_create_table_province extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%province}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'code' => $this->string(45)->comment('Province code'),
                'name' => $this->string()->notNull()->comment('Province name'),
            ],
            $tableOptions
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%province}}');
    }
}
