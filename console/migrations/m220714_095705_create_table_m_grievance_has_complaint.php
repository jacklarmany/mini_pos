<?php

use yii\db\Migration;

class m220714_095705_create_table_m_grievance_has_complaint extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%m_grievance_has_complaint}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'corrective_action' => $this->string()->comment('Corrective action'),
                'm_complaint_toppic_id' => $this->integer()->notNull()->comment('Is foreign keys from relation table complaint topic'),
                'm_grievance_id' => $this->integer()->notNull()->comment('Is foreign keys from relation table grievance'),
            ],
            $tableOptions
        );

        $this->createIndex('fk_m_grievance_has_complaint_m_complaint_toppic1_idx', '{{%m_grievance_has_complaint}}', ['m_complaint_toppic_id']);
        $this->createIndex('fk_m_grievance_has_complaint_m_grievance1_idx', '{{%m_grievance_has_complaint}}', ['m_grievance_id']);

        $this->addForeignKey(
            'fk_m_grievance_has_complaint_m_complaint_toppic1',
            '{{%m_grievance_has_complaint}}',
            ['m_complaint_toppic_id'],
            '{{%m_complaint_toppic}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'fk_m_grievance_has_complaint_m_grievance1',
            '{{%m_grievance_has_complaint}}',
            ['m_grievance_id'],
            '{{%m_grievance}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%m_grievance_has_complaint}}');
    }
}
