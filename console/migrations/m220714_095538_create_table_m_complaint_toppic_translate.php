<?php

use yii\db\Migration;

class m220714_095538_create_table_m_complaint_toppic_translate extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%m_complaint_toppic_translate}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'name' => $this->string(45)->comment('Complaint topic name translate'),
                'language' => $this->string(45)->comment('Language code'),
                'm_complaint_toppic_id' => $this->integer()->notNull()->comment('m_complaint_toppic_id is foreign key from relation table complaint topic'),
            ],
            $tableOptions
        );

        $this->createIndex('fk_m_complaint_toppic_translate_m_complaint_toppic1_idx', '{{%m_complaint_toppic_translate}}', ['m_complaint_toppic_id']);

        $this->addForeignKey(
            'fk_m_complaint_toppic_translate_m_complaint_toppic1',
            '{{%m_complaint_toppic_translate}}',
            ['m_complaint_toppic_id'],
            '{{%m_complaint_toppic}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%m_complaint_toppic_translate}}');
    }
}
