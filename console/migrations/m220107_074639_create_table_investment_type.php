<?php

use yii\db\Migration;

class m220107_074639_create_table_investment_type extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%investment_type}}',
            [
                'id' => $this->primaryKey(),
                'name' => $this->string()->notNull(),
            ],
            $tableOptions
        );
    }

    public function down()
    {
        $this->dropTable('{{%investment_type}}');
    }
}
