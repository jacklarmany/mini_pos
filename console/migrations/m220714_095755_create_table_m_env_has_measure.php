<?php

use yii\db\Migration;

class m220714_095755_create_table_m_env_has_measure extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%m_env_has_measure}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'm_env_measure_id' => $this->integer()->notNull()->comment('Is foreign keys from  relation table env measure '),
                'm_measure_id' => $this->integer()->notNull()->comment('Is foreign keys from  relation table measure '),
                'result' => $this->string()->comment('Result'),
            ],
            $tableOptions
        );

        $this->createIndex('fk_m_env_measure_has_m_measure_m_env_measure1_idx', '{{%m_env_has_measure}}', ['m_env_measure_id']);
        $this->createIndex('fk_m_env_measure_has_m_measure_m_measure1_idx', '{{%m_env_has_measure}}', ['m_measure_id']);

        $this->addForeignKey(
            'fk_m_env_measure_has_m_measure_m_env_measure1',
            '{{%m_env_has_measure}}',
            ['m_env_measure_id'],
            '{{%m_env_measure}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'fk_m_env_measure_has_m_measure_m_measure1',
            '{{%m_env_has_measure}}',
            ['m_measure_id'],
            '{{%m_measure}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%m_env_has_measure}}');
    }
}
