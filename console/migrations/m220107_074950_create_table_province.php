<?php

use yii\db\Migration;

class m220107_074950_create_table_province extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%province}}',
            [
                'id' => $this->primaryKey(),
                'code' => $this->string(45),
                'name' => $this->string()->notNull(),
            ],
            $tableOptions
        );
    }

    public function down()
    {
        $this->dropTable('{{%province}}');
    }
}
