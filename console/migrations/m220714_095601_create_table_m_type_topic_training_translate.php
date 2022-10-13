<?php

use yii\db\Migration;

class m220714_095601_create_table_m_type_topic_training_translate extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%m_type_topic_training_translate}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'name' => $this->string()->comment('Name translate'),
                'language' => $this->string(45)->comment('Language code'),
                'm_type_topic_training_id' => $this->integer()->notNull()->comment('Is foreign keys from relation  table topic training'),
            ],
            $tableOptions
        );

        $this->createIndex('fk_m_type_topic_training_translate_m_type_topic_training1_idx', '{{%m_type_topic_training_translate}}', ['m_type_topic_training_id']);

        $this->addForeignKey(
            'fk_m_type_topic_training_translate_m_type_topic_training1',
            '{{%m_type_topic_training_translate}}',
            ['m_type_topic_training_id'],
            '{{%m_type_topic_training}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%m_type_topic_training_translate}}');
    }
}
