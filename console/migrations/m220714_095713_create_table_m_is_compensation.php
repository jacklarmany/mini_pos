<?php

use yii\db\Migration;

class m220714_095713_create_table_m_is_compensation extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%m_is_compensation}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'village' => $this->integer()->comment('Total villages'),
                'household' => $this->integer()->comment('Total household'),
                'person' => $this->integer()->comment('Total person'),
                'value' => $this->decimal(12, 2)->comment('Values'),
                'm_total_resttlement_id' => $this->integer()->notNull()->comment('Is foreign keys from relation table total resttlement '),
                'm_compensation_id' => $this->integer()->notNull()->comment('Is foreign keys from relation table total compensation'),
            ],
            $tableOptions
        );

        $this->createIndex('fk_m_is_compensation_m_compensation1_idx', '{{%m_is_compensation}}', ['m_compensation_id']);
        $this->createIndex('fk_m_is_resettlement_people_m_total_resttlement1_idx', '{{%m_is_compensation}}', ['m_total_resttlement_id']);

        $this->addForeignKey(
            'fk_m_is_compensation_m_compensation1',
            '{{%m_is_compensation}}',
            ['m_compensation_id'],
            '{{%m_compensation}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'fk_m_is_resettlement_people_m_total_resttlement10',
            '{{%m_is_compensation}}',
            ['m_total_resttlement_id'],
            '{{%m_total_resttlement}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%m_is_compensation}}');
    }
}
