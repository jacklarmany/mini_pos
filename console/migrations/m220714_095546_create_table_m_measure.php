<?php

use yii\db\Migration;

class m220714_095546_create_table_m_measure extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%m_measure}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'measure_name' => $this->string()->notNull()->comment('Measure name'),
            ],
            $tableOptions
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%m_measure}}');
    }
}
