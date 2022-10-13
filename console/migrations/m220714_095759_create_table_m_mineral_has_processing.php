<?php

use yii\db\Migration;

class m220714_095759_create_table_m_mineral_has_processing extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%m_mineral_has_processing}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'valume_ton' => $this->string(45)->comment('Volume(Tons)'),
                'source_province' => $this->string()->comment('Source from'),
                'm_mineral_processing_id' => $this->integer()->notNull()->comment('Is foreign keys from relation table mineral processing'),
                'mineral_id' => $this->integer()->notNull()->comment('Is foreign keys from relation table mineral'),
            ],
            $tableOptions
        );

        $this->createIndex('fk_m_mineral_has_processing_m_mineral_processing1_idx', '{{%m_mineral_has_processing}}', ['m_mineral_processing_id']);
        $this->createIndex('fk_m_mineral_has_processing_mineral1_idx', '{{%m_mineral_has_processing}}', ['mineral_id']);

        $this->addForeignKey(
            'fk_m_mineral_has_processing_mineral1',
            '{{%m_mineral_has_processing}}',
            ['mineral_id'],
            '{{%mineral}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'fk_m_mineral_has_processing_m_mineral_processing1',
            '{{%m_mineral_has_processing}}',
            ['m_mineral_processing_id'],
            '{{%m_mineral_processing}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%m_mineral_has_processing}}');
    }
}
