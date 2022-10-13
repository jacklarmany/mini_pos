<?php

use yii\db\Migration;

class m220714_095715_create_table_m_lao_national_staff_training extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%m_lao_national_staff_training}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'is_sending_lao_national_staff_training' => $this->tinyInteger()->comment('Is has send '),
                'ref_document' => $this->tinyInteger()->comment('Reference document'),
                'title_id' => $this->integer()->unsigned()->notNull()->comment('Is foreign keys from relation table title'),
                'monitoring_id' => $this->integer()->notNull()->comment('Is foreign keys from relation table monitoring'),
                'compliance_id' => $this->integer()->unsigned()->comment('Is foreign keys from relation table complaince'),
            ],
            $tableOptions
        );

        $this->createIndex('fk_m_lao_national_staff_training_compliance1_idx', '{{%m_lao_national_staff_training}}', ['compliance_id']);
        $this->createIndex('fk_m_lao_national_staff_training_title_has_monitoring1_idx', '{{%m_lao_national_staff_training}}', ['title_id', 'monitoring_id']);

        $this->addForeignKey(
            'fk_m_lao_national_staff_training_compliance1',
            '{{%m_lao_national_staff_training}}',
            ['compliance_id'],
            '{{%compliance}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%m_lao_national_staff_training}}');
    }
}
