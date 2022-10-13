<?php

use yii\db\Migration;

class m220714_095800_create_table_m_non_contractual_contribution extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%m_non_contractual_contribution}}',
            [
                'id' => $this->primaryKey()->unsigned()->comment('Primary key of table is auto increment'),
                'contribution_value' => $this->double()->defaultValue('0')->comment('Contribution value'),
                'contribution_type_id' => $this->integer()->notNull()->comment('Is foreign keys for relation table contribution type'),
                'm_non_contractual_contribution_has_compliance_id' => $this->integer()->notNull()->comment('Is foreign keys for relation table non contractual contribution has compliance'),
            ],
            $tableOptions
        );

        $this->createIndex('fk_m_non_contractual_contribution_contribution_type1_idx', '{{%m_non_contractual_contribution}}', ['contribution_type_id']);
        $this->createIndex('fk_m_non_contractual_contribution_m_non_contractual_contrib_idx', '{{%m_non_contractual_contribution}}', ['m_non_contractual_contribution_has_compliance_id']);

        $this->addForeignKey(
            'fk_m_non_contractual_contribution_contribution_type1',
            '{{%m_non_contractual_contribution}}',
            ['contribution_type_id'],
            '{{%contribution_type}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'fk_m_non_contractual_contribution_m_non_contractual_contribut1',
            '{{%m_non_contractual_contribution}}',
            ['m_non_contractual_contribution_has_compliance_id'],
            '{{%m_non_contractual_contribution_has_compliance}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%m_non_contractual_contribution}}');
    }
}
