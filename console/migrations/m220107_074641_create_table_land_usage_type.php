<?php

use yii\db\Migration;

class m220107_074641_create_table_land_usage_type extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%land_usage_type}}',
            [
                'id' => $this->primaryKey(),
                'name' => $this->string()->notNull(),
            ],
            $tableOptions
        );
    }

    public function down()
    {
        $this->dropTable('{{%land_usage_type}}');
    }
}
