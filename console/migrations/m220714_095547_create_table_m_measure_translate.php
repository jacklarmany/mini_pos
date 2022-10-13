<?php

use yii\db\Migration;

class m220714_095547_create_table_m_measure_translate extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%m_measure_translate}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'language' => $this->string(45)->comment('Language code'),
                'measure_name' => $this->string()->notNull()->comment('measure name translate'),
                'm_measure_id' => $this->integer()->notNull()->comment('Is foreign keys from relation table measure'),
            ],
            $tableOptions
        );

        $this->createIndex('fk_m_measure_translate_m_measure1_idx', '{{%m_measure_translate}}', ['m_measure_id']);

        $this->addForeignKey(
            'fk_m_measure_translate_m_measure1',
            '{{%m_measure_translate}}',
            ['m_measure_id'],
            '{{%m_measure}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%m_measure_translate}}');
    }
}
