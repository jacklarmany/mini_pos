<?php

use yii\db\Migration;

class m220714_095602_create_table_mineral extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%mineral}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'name' => $this->string()->notNull()->comment('Name'),
            ],
            $tableOptions
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%mineral}}');
    }
}
