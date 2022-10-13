<?php

use yii\db\Migration;

class m220714_095524_create_table_energy_type extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%energy_type}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'name' => $this->string(45)->notNull()->comment('Energy type name'),
            ],
            $tableOptions
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%energy_type}}');
    }
}
