<?php

use yii\db\Migration;

class m220714_095600_create_table_m_type_topic_training extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%m_type_topic_training}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'name' => $this->string()->notNull()->comment('Name'),
            ],
            $tableOptions
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%m_type_topic_training}}');
    }
}
