<?php

use yii\db\Migration;

class m220714_095754_create_table_m_contractual_contrubution extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%m_contractual_contrubution}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'contribution_value' => $this->double()->defaultValue('0')->comment('Contribution value'),
                'm_contractual_contrubution_has_compliance_id' => $this->integer()->notNull()->comment('is foreign key from relation table contractual_contrubution_has_compliance'),
                'fund_id' => $this->integer()->notNull()->comment('is foreign key from relation table fund'),
            ],
            $tableOptions
        );

        $this->createIndex('fk_m_contractual_contrubution_fund1_idx', '{{%m_contractual_contrubution}}', ['fund_id']);
        $this->createIndex('fk_m_contractual_contrubution_m_contractual_contrubution_ha_idx', '{{%m_contractual_contrubution}}', ['m_contractual_contrubution_has_compliance_id']);

        $this->addForeignKey(
            'fk_m_contractual_contrubution_fund1',
            '{{%m_contractual_contrubution}}',
            ['fund_id'],
            '{{%fund}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'fk_m_contractual_contrubution_m_contractual_contrubution_has_1',
            '{{%m_contractual_contrubution}}',
            ['m_contractual_contrubution_has_compliance_id'],
            '{{%m_contractual_contrubution_has_compliance}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%m_contractual_contrubution}}');
    }
}
