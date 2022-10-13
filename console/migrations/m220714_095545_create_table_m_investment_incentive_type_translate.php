<?php

use yii\db\Migration;

class m220714_095545_create_table_m_investment_incentive_type_translate extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%m_investment_incentive_type_translate}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'name' => $this->string()->notNull()->comment('Name translate'),
                'language' => $this->string(2)->defaultValue('0')->comment('Language code'),
                'm_investment_incentive_type_id' => $this->integer()->notNull()->comment('Is foreign keys from relation table investment incentive type'),
            ],
            $tableOptions
        );

        $this->createIndex('fk_m_investment_incentive_type_translate_m_investment_incen_idx', '{{%m_investment_incentive_type_translate}}', ['m_investment_incentive_type_id']);
    }

    public function safeDown()
    {
        $this->dropTable('{{%m_investment_incentive_type_translate}}');
    }
}
