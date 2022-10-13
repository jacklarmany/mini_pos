<?php

use yii\db\Migration;

class m220107_074940_create_table_language_source extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%language_source}}',
            [
                'id' => $this->primaryKey(),
                'category' => $this->string(32),
                'message' => $this->text(),
            ],
            $tableOptions
        );
    }

    public function down()
    {
        $this->dropTable('{{%language_source}}');
    }
}
