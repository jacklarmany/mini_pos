<?php

use yii\db\Migration;

class m220714_095742_create_table_m_topic_training extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%m_topic_training}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'total_number' => $this->integer()->comment('Total number'),
                'female' => $this->integer()->comment('Total female'),
                'm_lao_national_staff_training_id' => $this->integer()->notNull()->comment('Is foreign keys from relation table lao national staff trainning'),
                'm_type_topic_training_id' => $this->integer()->notNull(),
            ],
            $tableOptions
        );

        $this->createIndex('fk_m_topic_training_m_lao_national_staff_training1_idx', '{{%m_topic_training}}', ['m_lao_national_staff_training_id']);
        $this->createIndex('fk_m_topic_training_m_type_topic_training1_idx', '{{%m_topic_training}}', ['m_type_topic_training_id']);

        $this->addForeignKey(
            'fk_m_topic_training_m_lao_national_staff_training1',
            '{{%m_topic_training}}',
            ['m_lao_national_staff_training_id'],
            '{{%m_lao_national_staff_training}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'fk_m_topic_training_m_type_topic_training1',
            '{{%m_topic_training}}',
            ['m_type_topic_training_id'],
            '{{%m_type_topic_training}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%m_topic_training}}');
    }
}
