<?php

use yii\db\Migration;

class m220107_074929_create_table_energy_type extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%energy_type}}',
            [
                'id' => $this->primaryKey(),
                'name' => $this->string(45)->notNull(),
            ],
            $tableOptions
        );
    }

    public function down()
    {
        $this->dropTable('{{%energy_type}}');
    }
}
