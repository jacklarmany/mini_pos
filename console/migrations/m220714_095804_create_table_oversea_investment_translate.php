<?php

use yii\db\Migration;

class m220714_095804_create_table_oversea_investment_translate extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%oversea_investment_translate}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'company_name' => $this->string()->notNull()->comment('Company name'),
                'language' => $this->string(45)->comment('Language code'),
                'oversea_investment_id' => $this->integer()->notNull()->comment('Is foreign keys from relation table Oversea investment '),
            ],
            $tableOptions
        );

        $this->createIndex('fk_oversea_investment_translate_oversea_investment1_idx', '{{%oversea_investment_translate}}', ['oversea_investment_id']);

        $this->addForeignKey(
            'fk_oversea_investment_translate_oversea_investment1',
            '{{%oversea_investment_translate}}',
            ['oversea_investment_id'],
            '{{%oversea_investment}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%oversea_investment_translate}}');
    }
}
