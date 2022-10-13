<?php

use yii\db\Migration;

class m220714_095551_create_table_m_total_resttlement_translate extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%m_total_resttlement_translate}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'language' => $this->string(45)->comment('Language code'),
                'name' => $this->string()->comment('Name translate'),
                'm_total_resttlement_id' => $this->integer()->notNull()->comment('Is foreign keys from relation table total restlement'),
            ],
            $tableOptions
        );

        $this->createIndex('fk_m_total_resttlement_translate_m_total_resttlement1_idx', '{{%m_total_resttlement_translate}}', ['m_total_resttlement_id']);

        $this->addForeignKey(
            'fk_m_total_resttlement_translate_m_total_resttlement1',
            '{{%m_total_resttlement_translate}}',
            ['m_total_resttlement_id'],
            '{{%m_total_resttlement}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%m_total_resttlement_translate}}');
    }
}
