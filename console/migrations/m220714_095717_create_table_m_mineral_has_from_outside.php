<?php

use yii\db\Migration;

class m220714_095717_create_table_m_mineral_has_from_outside extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%m_mineral_has_from_outside}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'volume_ton' => $this->string(45)->comment('Volume (tons)'),
                'source_from' => $this->string()->comment('Sources from'),
                'm_mineral_form_outside_id' => $this->integer()->notNull()->comment('Is foreign key from relation table mineral from outside'),
                'mineral_id' => $this->integer()->notNull()->comment('Is foreign key from relation table mineral'),
            ],
            $tableOptions
        );

        $this->createIndex('fk_m_mineral_has_from_outside_m_mineral_form_outside1_idx', '{{%m_mineral_has_from_outside}}', ['m_mineral_form_outside_id']);
        $this->createIndex('fk_m_mineral_has_from_outside_mineral1_idx', '{{%m_mineral_has_from_outside}}', ['mineral_id']);

        $this->addForeignKey(
            'fk_m_mineral_has_from_outside_mineral1',
            '{{%m_mineral_has_from_outside}}',
            ['mineral_id'],
            '{{%mineral}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'fk_m_mineral_has_from_outside_m_mineral_form_outside1',
            '{{%m_mineral_has_from_outside}}',
            ['m_mineral_form_outside_id'],
            '{{%m_mineral_form_outside}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%m_mineral_has_from_outside}}');
    }
}
