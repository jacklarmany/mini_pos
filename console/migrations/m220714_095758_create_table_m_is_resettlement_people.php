<?php

use yii\db\Migration;

class m220714_095758_create_table_m_is_resettlement_people extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%m_is_resettlement_people}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'village' => $this->integer()->comment('Total villages'),
                'household' => $this->integer()->comment('Total household'),
                'person' => $this->integer()->comment('Total person'),
                'value' => $this->decimal(12, 2)->comment('Value'),
                'm_resettlement_people_id' => $this->integer()->notNull()->comment('Is foreign key from relation table resettlement people'),
                'm_total_resttlement_id' => $this->integer()->notNull(),
            ],
            $tableOptions
        );

        $this->createIndex('fk_m_is_resettlement_people_m_resettlement_people1_idx', '{{%m_is_resettlement_people}}', ['m_resettlement_people_id']);
        $this->createIndex('fk_m_is_resettlement_people_m_total_resttlement1_idx', '{{%m_is_resettlement_people}}', ['m_total_resttlement_id']);

        $this->addForeignKey(
            'fk_m_is_resettlement_people_m_resettlement_people1',
            '{{%m_is_resettlement_people}}',
            ['m_resettlement_people_id'],
            '{{%m_resettlement_people}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'fk_m_is_resettlement_people_m_total_resttlement1',
            '{{%m_is_resettlement_people}}',
            ['m_total_resttlement_id'],
            '{{%m_total_resttlement}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%m_is_resettlement_people}}');
    }
}
