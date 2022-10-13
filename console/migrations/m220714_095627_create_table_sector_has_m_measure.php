<?php

use yii\db\Migration;

class m220714_095627_create_table_sector_has_m_measure extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%sector_has_m_measure}}',
            [
                'sector_id' => $this->integer()->notNull()->comment('Is foreign keys from relation table sector'),
                'm_measure_id' => $this->integer()->notNull()->comment('Is foreign keys from relation table measure'),
            ],
            $tableOptions
        );

        $this->addPrimaryKey('PRIMARYKEY', '{{%sector_has_m_measure}}', ['sector_id', 'm_measure_id']);

        $this->createIndex('fk_sector_has_m_measure_m_measure1_idx', '{{%sector_has_m_measure}}', ['m_measure_id']);
        $this->createIndex('fk_sector_has_m_measure_sector1_idx', '{{%sector_has_m_measure}}', ['sector_id']);

        $this->addForeignKey(
            'fk_sector_has_m_measure_m_measure1',
            '{{%sector_has_m_measure}}',
            ['m_measure_id'],
            '{{%m_measure}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'fk_sector_has_m_measure_sector1',
            '{{%sector_has_m_measure}}',
            ['sector_id'],
            '{{%sector}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%sector_has_m_measure}}');
    }
}
