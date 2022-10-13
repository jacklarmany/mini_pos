<?php

use yii\db\Migration;

class m220714_095756_create_table_m_has_processed_ores_in_country extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%m_has_processed_ores_in_country}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'volume_ton' => $this->string(45)->comment('Volume (tons/livestock units) '),
                'value' => $this->decimal(12, 2)->comment('Value'),
                'm_processed_ores_in_country_id' => $this->integer()->notNull()->comment('Is foreign key from relation table processed ores in country'),
                'mineral_id' => $this->integer()->notNull()->comment('Is foreign key from relation table Mineral'),
            ],
            $tableOptions
        );

        $this->createIndex('fk_m_has_processed_ores_in_country_m_processed_ores_in_coun_idx', '{{%m_has_processed_ores_in_country}}', ['m_processed_ores_in_country_id']);
        $this->createIndex('fk_m_has_processed_ores_in_country_mineral1_idx', '{{%m_has_processed_ores_in_country}}', ['mineral_id']);

        $this->addForeignKey(
            'fk_m_has_processed_ores_in_country_mineral1',
            '{{%m_has_processed_ores_in_country}}',
            ['mineral_id'],
            '{{%mineral}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'fk_m_has_processed_ores_in_country_m_processed_ores_in_country1',
            '{{%m_has_processed_ores_in_country}}',
            ['m_processed_ores_in_country_id'],
            '{{%m_processed_ores_in_country}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%m_has_processed_ores_in_country}}');
    }
}
