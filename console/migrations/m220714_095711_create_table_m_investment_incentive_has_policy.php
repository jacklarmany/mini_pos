<?php

use yii\db\Migration;

class m220714_095711_create_table_m_investment_incentive_has_policy extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%m_investment_incentive_has_policy}}',
            [
                'm_investment_incentive_id' => $this->integer()->notNull()->comment('is foreign keys from relation table investment incentive'),
                'policy_id' => $this->integer()->notNull()->comment('is foreign keys from relation table policy'),
            ],
            $tableOptions
        );

        $this->addPrimaryKey('PRIMARYKEY', '{{%m_investment_incentive_has_policy}}', ['m_investment_incentive_id', 'policy_id']);

        $this->createIndex('fk_m_investment_incentive_has_policy_m_investment_incentive_idx', '{{%m_investment_incentive_has_policy}}', ['m_investment_incentive_id']);
        $this->createIndex('fk_m_investment_incentive_has_policy_policy1_idx', '{{%m_investment_incentive_has_policy}}', ['policy_id']);

        $this->addForeignKey(
            'fk_m_investment_incentive_has_policy_m_investment_incentive1',
            '{{%m_investment_incentive_has_policy}}',
            ['m_investment_incentive_id'],
            '{{%m_investment_incentive}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'fk_m_investment_incentive_has_policy_policy1',
            '{{%m_investment_incentive_has_policy}}',
            ['policy_id'],
            '{{%policy}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%m_investment_incentive_has_policy}}');
    }
}
